<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eligibility;
use App\Models\Job;
use App\Models\JobEligibility;
use Illuminate\Http\Request;

class JobEligibilityController extends Controller
{
    //


    public function index()
    {
    
    
    
    if (request()->ajax()) {
        $job_eligibility = JobEligibility::select(['id', 'job_id', 'eligibility_id', 'status']);
        return datatables()->of($job_eligibility)
            ->editColumn('job_id', function ($job_eligibility) {
                return getJobName($job_eligibility->job_id);
            })
            ->editColumn('eligibility_id', function ($job_eligibility) {
                return getEligibilityName($job_eligibility->eligibility_id);
            })
          
            ->addColumn('action', 'admin.jobeligibilities.action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
    }
    return view('admin.jobeligibilities.index');
    
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    $job =     Job::where('status',1)->get();
    $eligibility =     Eligibility::where('status',1)->get();
    
    return view('admin.jobeligibilities.create',compact('job','eligibility'));
    }
    
    
    public function store(Request $request)
    {
    
        //$input = $request->all();
        $request->validate([
            'job_id' => 'required',
            'eligibility_id' => 'required',
            ]);
    
        $job_eligibility = new JobEligibility();
        $job_eligibility->job_id = $request->job_id;
        $job_eligibility->eligibility_id = $request->eligibility_id;
        if($request->status=='off')
        {
            $job_eligibility->status = '0';
        }
        else{
            $job_eligibility->status = '1';
        }
        $job_eligibility->save();
    
        return redirect()->route('admin.jobeligibilities.index')
        ->with('success','Job Eligibility has been created successfully.');
        
    
    }   
    public function show(JobEligibility $jobeligibility)
    {
        return view('admin.jobeligibilities.show', compact('jobeligibility'));
    }
    
    
      /*
        params = $amenity;
        call the amenities edit view page
        return view name admin.amenities.edit, variables = amenity object
        */
        public function edit(JobEligibility $jobeligibility)
        {
            
            $job =     Job::where('status',1)->get();
            $eligibility =     Eligibility::where('status',1)->get();
            return view('admin.jobeligibilities.edit', compact('jobeligibility','job','eligibility'));
        }
    
    
        public function update(Request $request, $id)
        {
            $request->validate([
                'job_id' => 'required',
                'eligibility_id' => 'required',
                ]);
    
            $job_eligibility = JobEligibility::find($id);
            $job_eligibility->job_id = $request->job_id;
            $job_eligibility->eligibility_id = $request->eligibility_id;
            if($request->status=='on')
            {
                $job_eligibility->status = '0';
            }
            else{
                $job_eligibility->status = '1';
            }
            $job_eligibility->save();
            return redirect()->route('admin.jobeligibilities.index')
                ->with('success', 'Job Eligibility Has Been updated successfully');
        }
    
     /*
        params = $request;
        delete the rows in the table based on id
        return the rest of the columns
        */
        public function destroy(Request $request)
        {
            $job_eligibility = JobEligibility::where('id', $request->id)->delete();
            return Response()->json($job_eligibility);
        }
}
