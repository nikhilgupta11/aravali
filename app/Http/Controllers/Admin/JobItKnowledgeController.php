<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Itknowledge;
use App\Models\Job;
use App\Models\JobITKnowledge;
use Illuminate\Http\Request;

class JobItKnowledgeController extends Controller
{
    //

    public function index()
    {



        if (request()->ajax()) {
            $job_it_knowledge = JobITKnowledge::select(['id', 'job_id', 'it_knowledge_id', 'status']);
            return datatables()->of($job_it_knowledge)
                ->editColumn('job_id', function ($job_it_knowledge) {
                    return getJobName($job_it_knowledge->job_id);
                })
                ->editColumn('it_knowledge_id', function ($job_it_knowledge) {
                    return getItknowledgeName($job_it_knowledge->it_knowledge_id);
                })

                ->addColumn('action', 'admin.job_it_knowledge.action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.job_it_knowledge.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job =     Job::where('status', 1)->get();
        $itknowledge =     Itknowledge::where('status', 1)->get();

        return view('admin.job_it_knowledge.create', compact('job', 'itknowledge'));
    }


    public function store(Request $request)
    {

        //$input = $request->all();
        $request->validate([
            'job_id' => 'required',
            'it_knowledge_id' => 'required',
        ]);

        $job_it_knowledge = new JobITKnowledge();
        $job_it_knowledge->job_id = $request->job_id;
        $job_it_knowledge->it_knowledge_id = $request->it_knowledge_id;
        if ($request->status == 'off') {
            $job_it_knowledge->status = '0';
        } else {
            $job_it_knowledge->status = '1';
        }
        $job_it_knowledge->save();

        return redirect()->route('admin.job_it_knowledge.index')
            ->with('success', 'Job It knowledge has been created successfully.');
    }
    public function show(JobITKnowledge $job_it_knowledge)
    {
        return view('admin.job_it_knowledge.show', compact('job_it_knowledge'));
    }


    /*
        params = $amenity;
        call the amenities edit view page
        return view name admin.amenities.edit, variables = amenity object
        */
    public function edit(JobITKnowledge $job_it_knowledge)
    {

       
        $job =     Job::where('status', 1)->get();
        $it_knowledge =     Itknowledge::where('status', 1)->get();
        return view('admin.job_it_knowledge.edit', compact('job_it_knowledge', 'job', 'it_knowledge'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'job_id' => 'required',
            'it_knowledge_id' => 'required',
        ]);

        $job_it_knowledge = JobITKnowledge::find($id);
        $job_it_knowledge->job_id = $request->job_id;
        $job_it_knowledge->it_knowledge_id = $request->it_knowledge_id;
        if ($request->status == 'on') {
            $job_it_knowledge->status = '0';
        } else {
            $job_it_knowledge->status = '1';
        }
        $job_it_knowledge->save();
        return redirect()->route('admin.job_it_knowledge.index')
            ->with('success', 'Job It knowledge Has Been updated successfully');
    }

    /*
        params = $request;
        delete the rows in the table based on id
        return the rest of the columns
        */
    public function destroy(Request $request)
    {
        $job_eligibility = JobITKnowledge::where('id', $request->id)->delete();
        return Response()->json($job_eligibility);
    }
}
