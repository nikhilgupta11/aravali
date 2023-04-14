<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Department;
use App\Models\DepartmentDistrict;
use App\Models\District;
use App\Models\Eligibility;
use App\Models\Itknowledge;
use App\Models\Job;
use App\Models\JobDistrict;
use App\Models\JobEligibility;
use App\Models\JobITKnowledge;
use App\Models\State;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //

    public function index()
    {
        if (request()->ajax()) {
            $jobs = Job::select(['id', 'state_id', 'description', 'country_id', 'district_id', 'department_id', 'start_date', 'end_date', 'job_title', 'status', 'salary', 'no_of_post'])->orderBy('created_at','desc');
            return datatables()->of($jobs)
                ->editColumn('state_id', function ($jobs) {
                    return getStateName($jobs->state_id);
                })
                ->editColumn('country_id', function ($jobs) {
                    return getNationalityName($jobs->country_id);
                })
              ->editColumn('department_id', function ($jobs) {
                    return getDepartmentName($jobs->department_id);
                })->editColumn('salary', function ($jobs) {
                    $salary_amt = '₹';
                    $amt = $salary_amt . ' ' . $jobs->salary;
                    return $amt;
                    })

                ->addColumn('action', 'admin.jobs.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state =     State::where('status', 1)->where('flag','!=',1)->get();
        $country =     Country::where('status', 1)->where('flag','!=',1)->get();
        $district =     District::where('status', 1)->get();
        $department =     Department::all();
        $eligibility =     Eligibility::where('status', 1)->get();
        $itknowledge =     Itknowledge::where('status', 1)->get();

        $selected_state =     State::where('status', 1)->where('flag',1)->first();
        $selected_country = Country::where('status', 1)->where('flag',1)->first();
      
        return view('admin.jobs.create', compact('state', 'district','selected_state','selected_country', 'department', 'country', 'eligibility', 'itknowledge'));
    }


    public function store(Request $request)
    {
    
          
            $request->validate([
                'state_id' => 'required',
                'country_id' => 'required',
                'district_id' => 'required',
                'department_id' => 'required',
                'job_title' => 'required',
                'eligibility_id' => 'required',
                'it_knowledge_id' => 'required',

                'salary' => 'required',
                'start_date' => 'required',
                
                'description' => 'required',
                'end_date' => 'required',
                'no_of_post' => 'required|numeric',
            ]);
      



        // $state = new Department();
        // $state->state_id = $request->state_id;
        // $state->district_id = $request->district_id;

        $district_id = $request->input('district_id');
       
       
        $eligibility_id = $request->input('eligibility_id');
        $it_knowledge_id = $request->input('it_knowledge_id');
        //print_r($amenity_codes);
        //$coun=count($amenity_codes);
        // echo $coun;



       

            $job = new Job();
            $job->job_title = $request->job_title;
            $job->state_id = $request->state_id;
           
            $job->description = $request->description;

            $job->no_of_post = $request->no_of_post;
            $job->department_id = $request->department_id;
            $job->start_date = $request->start_date;
            $job->end_date = $request->end_date;
            $job->country_id = $request->country_id;
            $job->salary = $request->salary;
            if ($request->status == 'on') {
                $job->status = '1';
            } else {
                $job->status = '0';
            }
           $job->save();
         //  print_r($district_id);

            foreach ($district_id as $data) {


                $jobdistrict = new JobDistrict;
                $jobdistrict->district_id = $data;
                $district_name =  getDistrictName($data);
                $jobdistrict->district_name = $district_name;
                $jobdistrict->job_id = $job->id;
                $jobdistrict->save();
            }
          
        $job_id = $job->id;

        foreach ($eligibility_id as $data) {

            $job = new JobEligibility();
            $job->job_id = $job_id;
            $job->eligibility_id = $data;

            $job->save();
        }
        foreach ($it_knowledge_id as $data) {
            $job = new JobITKnowledge();
            $job->job_id = $job_id;
            $job->it_knowledge_id = $data;


            $job->save();
        }


        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job created successfully.');
    }
    public function show(Job $job)
    {
        $state =     State::where('status', 1)->get();
        $district =     District::where('status', 1)->get();
        $department =     Department::where('status', 1)->get();

        return view('admin.jobs.show', compact('job'));
    }


    /*
    params = $amenity;
    call the amenities edit view page
    return view name admin.amenities.edit, variables = amenity object
    */
    public function edit(Job $job)
    {
        $state =     State::where('status', 1)->get();
        $department =    Department::where('status', 1)->get();
        $eligibility =     Eligibility::where('status', 1)->get();
        $job_eligibility_id =     JobEligibility::where('job_id', $job->id)->pluck('eligibility_id')->toarray();
        $itknowledge =     Itknowledge::where('status', 1)->get();
        $itknowledge_id =     JobITKnowledge::where('job_id', $job->id)->pluck('it_knowledge_id')->toarray();
        $country =     Country::where('status', 1)->get();
        $selected_district = JobDistrict::where('job_id', $job->id)->pluck('district_id')->toarray();
        $districts = District::whereIn('id', $selected_district)->get();


        $district = DepartmentDistrict::where('department_id', $job->department_id)->get();
      
        return view('admin.jobs.edit', compact('district', 'state', 'job', 'country', 'department', 'eligibility', 'itknowledge', 'job_eligibility_id', 'itknowledge_id', 'district', 'selected_district'));
    }


    public function update(Request $request, $id)
    {

    
   
            $request->validate([
                'state_id' => 'required',
                'country_id' => 'required',
                'eligibility_id' => 'required',
                'it_knowledge_id' => 'required',
                'district_id' => 'required',
                'department_id' => 'required',
                'job_title' => 'required',
              
                'description' => 'required',
                'salary' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'no_of_post' => 'required',
            ]);
       


        $job_district = JobDistrict::where('job_id', $id);

        $job_district->delete();



        $district_id = $request->input('district_id');
        $eligibility_id = $request->input('eligibility_id');
        $it_knowledge_id = $request->input('it_knowledge_id');
        //print_r($amenity_codes);
        //$coun=count($amenity_codes);
        // echo $coun;

      


            $job =  Job::find($id);
            $job->job_title = $request->job_title;
          
            $job->description = $request->description;
            $job->country_id = $request->country_id;
            $job->state_id = $request->state_id;
            $job->no_of_post = $request->no_of_post;
            $job->department_id = $request->department_id;
            $job->start_date = $request->start_date;
            $job->end_date = $request->end_date;
            $job->salary = $request->salary;
            if ($request->status == 'on') {
                $job->status = '1';
            } else {
                $job->status = '0';
            }
            $job->save();
            foreach ($district_id as $data) {
            $jobdistrict = new JobDistrict;
             $jobdistrict->district_id = $data;
             $district_name =  getDistrictName($data);
             $jobdistrict->district_name = $district_name;
             $jobdistrict->job_id = $job->id;
             $jobdistrict->save();
            }
       

        $job_id = $job->id;

        $job_eligibility = JobEligibility::where('job_id', $id)->delete();
        $job_eligibility1 = JobITKnowledge::where('job_id', $id)->delete();

        foreach ($eligibility_id as $data) {

            $job = new JobEligibility();
            $job->job_id = $job_id;
            $job->eligibility_id = $data;

            $job->save();
        }
        foreach ($it_knowledge_id as $data) {
            $job = new JobITKnowledge();
            $job->job_id = $job_id;
            $job->it_knowledge_id = $data;


            $job->save();
        }


        return redirect()->route('admin.jobs.index')
            ->with('success', 'Job Has Been updated successfully');
    }



    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $jobs = Job::where('id', $request->id)->delete();
        return Response()->json($jobs);
    }


    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function getDistrict(Request $request)
    {
       
        $district_name = JobDistrict::where('job_id', $request->job_id)->get()->toArray();
       
       
       
   
        foreach($district_name as $data)
        {
            
            $distrct[] = $data['district_name'];
           
       
        }
        $district_data = (implode(",",$distrct));
  
       
        return response()->json(array('success' => true, 'html' => $district_data));
    }



      /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function getDepartmentDistrict(Request $request)
    {
       
        $district_name = DepartmentDistrict::where('department_id', $request->job_id)->get()->toArray();
        
       
        foreach($district_name as $data)
        {
            
            $distrct[] = $data['district_name'];
        }

        $district_data = (implode(",",$distrct));
       
        return response()->json(array('success' => true, 'html' => $district_data));
    }
}
