<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDistrict;
use App\Models\ApplicantItKnowledge;
use App\Models\Country;
use App\Models\DepartmentDistrict;
use App\Models\District;
use App\Models\Experience;
use App\Models\Job;
use App\Models\Qualification;
use App\Models\JobApplicant;
use App\Models\State;
use App\Exports\ApplicantExport;
use App\Models\Department;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    //

    public function index(Request $request)
    {

        $applicant_district = ApplicantDistrict::where('district_id', $request->get('district'))->orderBy('created_at', 'desc')->get();

        $user = JobApplicant::all();
        $jobs = Job::all();
        $country = Country::where('flag', '!=', 1)->get();
        $state = State::where('flag', '!=', 1)->get();
        $district = District::all();
        $department = Department::all();
        $selected_state = State::where('status', 1)->where('flag', 1)->first();
        $selected_country = Country::where('status', 1)->where('flag', 1)->first();
        if (request()->ajax()) {
            $jobs = JobApplicant::select(['id', 'job_id', 'name']);
            return datatables()->of($jobs)
                ->addColumn('action', 'admin.jobapplications.action')
                ->editColumn('job_id', function ($jobs) {
                    return getJobName($jobs->job_id);
                })
                ->filter(function ($instance) use ($request) {
                    if ($request->get('district')) {
                        $applicant_district = ApplicantDistrict::where('district_id', $request->get('district'))->pluck('user_id')->toArray();

                        $l = count($applicant_district);

                        $instance->whereIn('id', $applicant_district)->get();
                    }
                    if ($request->get('department')) {
                        $dept = Job::where('department_id', $request->get('department'))->pluck('id')->toArray();

                        $l = count($dept);
                        $instance->whereIn('job_id', $dept)->get();
                    }
                    if ($request->get('job_id')) {
                        // $job_id = Job::where('id', $request->get('job_id'))->get();

                        $data = $instance->where('job_id', $request->get('job_id'))->get();
                        // $instance->where('job_id', $job_id[0]->id);
                        $l = count($data);
                    }
                    if ($request->get('country')) {
                        $country = Country::where('id', $request->get('country'))->get();

                        $l = count($country);
                        $instance->where('nationality', $country[0]->id);
                    }
                    if ($request->get('state')) {
                        $state = State::where('id', $request->get('state'))->get();

                        $l = count($state);
                        $instance->where('state', $state[0]->id);
                    }


                    if (!empty($request->get('search1'))) {
                        $instance->where(function ($w) use ($request) {
                            $search1 = $request->get('search1');
                            $w->orWhere('job_id', 'LIKE', "%$search1%")
                                ->orWhere('name', 'LIKE', "%$search1%");
                        });
                    }
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin/jobapplications/index', compact('selected_state', 'selected_country', 'user', 'jobs', 'country', 'state', 'district', 'department'));
    }
    public function show($id)
    {
        $user = JobApplicant::where('id', $id)->first();
        $job = Job::where('id', $user->job_id)->first();
        $qualification = Qualification::where('user_id', $user->id)->get();

        $experience = Experience::where('user_id', $id)->get();
        $applicant_district = ApplicantDistrict::where('user_id', $user->id)->get();
        $applicant_other_qualification = ApplicantItKnowledge::where('user_id', $user->id)->get();

        return view('admin/jobapplications/show', compact('user', 'applicant_district', 'job', 'experience', 'qualification', 'applicant_other_qualification'));
    }


    /*
    params = $request;
    delete the rows in the table based on id
    return the rest of the columns
    */
    public function destroy(Request $request)
    {
        $jobsdata = JobApplicant::where('id', $request->id)->first();
        $jobs = JobApplicant::where('id', $request->id)->delete();
        $experience = Experience::where('user_id', $jobsdata->id)->delete();
        $qualification = Qualification::where('user_id', $jobsdata->id)->delete();
        $district = ApplicantDistrict::where('user_id', $jobsdata->id)->delete();
        $applicant_it_knowledge = ApplicantItKnowledge::where('user_id', $jobsdata->id)->delete();
        return Response()->json($jobs);
    }



    /**
     * @return \Illuminate\Support\Collection
     */
    public function export()
    {
        return Excel::download(new ApplicantExport, 'applicants.xlsx');
    }
}
