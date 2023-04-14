<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ApplicantDistrict;
use App\Models\ApplicantItKnowledge;
use App\Models\Category;
use App\Models\Country;
use App\Models\Department;
use App\Models\District;
use App\Models\Eligibility;
use App\Models\Experience;
use App\Models\Itknowledge;
use App\Models\Job;
use App\Models\Qualification;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\JobApplicant;
use App\Models\JobDistrict;
use App\Models\JobEligibility;
use App\Models\JobITKnowledge;

class UserInfoController extends Controller
{
    public function userjobs()
    {
        $department1 = Department::where('status', 1)->pluck('id')->toarray();
        $data = Job::whereIn('department_id', $department1)->where('status', '1')->orderBy('created_at')->get()->groupBy(function ($data) {
            return $data->department_id;
        });
        $department = Department::all();
        return view('Front/Pages/index', compact('data', 'department'));
    }
    public function index($id)
    {
        $job = Job::where('id', $id)->get();
        $country = Country::where('status', '1')->get();
        $state = State::where('status', '1')->get();
        $category = Category::where('status', '1')->get();

        $edu_quali = JobEligibility::where('job_id', $id)->pluck('eligibility_id')->toarray();

        $eligibility = Eligibility::whereIn('id', $edu_quali)->get();

        $edu_quali1 = JobITKnowledge::where('job_id', $id)->pluck('it_knowledge_id')->toarray();

        $eligibility1 = Itknowledge::whereIn('id', $edu_quali1)->get();

        $job_district = JobDistrict::where('job_id', $id)->get();

        return view('Front/Pages/userInfoForm', compact('country', 'state', 'category', 'job', 'eligibility', 'eligibility1', 'job_district'));
    }

    public function store(Request $request, $id)
    {
        $method = $request->method();
        // echo $method;
        // die;
        if ($request->isMethod('POST')) {

            $this->validate($request, [
                'name' => 'required',
                'gender' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'email' => 'required | email',
                'contact_number' => 'required | numeric | digits:10 ',
                'dob' => 'required ',
                'age' => 'required',
                'category' => 'required',
                'marital_status' => 'required',
                'aadhar_number' => 'required | numeric | digits:12',
                'correspondence_address' => 'required',
                'parmanent_address' => 'required',
                // 'district' => 'required',
                'state' => 'required',
                'country' => 'required',
                // 'exam_name' => 'required',
                // 'subject_name' => 'required',
                // 'board_name' => 'required',
                // 'roll_no' => 'required',
                // 'reasult' => 'required',
                // 'percentage' => 'required',
                // 'marksheet' => 'required',
                // 'job_nature' => 'required',
                // 'orgnisastion_name' => 'required ',
                // 'post_name' => 'required',
                // 'from' => 'required ',
                // 'to' => 'required ',
                // 'total_experience' => 'required',
                'signature' => 'required ',
                'image' => 'required',
                'declaration' => 'required',
            ]);

            $file_name4 = date('mdYHis') . uniqid() . '.' . $request->signature->extension();

            request()->signature->move(public_path('assets/images/'), $file_name4);

            $file_name3 = date('mdYHis') . uniqid() . '.' . $request->image->extension();

            request()->image->move(public_path('assets/images/'), $file_name3);

            $user = new JobApplicant;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->gender = $request->gender;
            $user->father_name = $request->father_name;
            $user->mother_name = $request->mother_name;
            $user->birth_date = $request->dob;
            $user->age = $request->age; 
            $user->category = $request->category;
            $user->martial_status = $request->marital_status;
            $user->mobile_no = $request->contact_number;
            $user->aadhar_number = $request->aadhar_number;
            $user->correspondence_address = $request->correspondence_address;
            $user->parmanent_address = $request->parmanent_address;
            $user->nationality = $request->country;
            $user->state = $request->state;
            if ($request->declaration == "on") {
                $user->declaration = 1;
            }

            $user->sinature = $file_name4;
            $user->image = $file_name3;

            $user->job_id = $id;
            $user->save();

            $userId = $user->id;

            $district_id = $request->district;
            if(isset($district_id)) {
                foreach ($district_id as $data) {
                    $Applicantdistrict = new ApplicantDistrict;
                    $Applicantdistrict->district_id = $data;
                    $Applicantdistrict->user_id = $userId;
                    $Applicantdistrict->save();
                }
            }

            $exam_name = $request->exam_name;
            $subject_name = $request->subject_name;
            $bord_university = $request->board_name;
            $roll_no = $request->roll_no;
            $result = $request->reasult;
            $passing_year = $request->passing_year;
            $percentage = $request->percentage;

            $insert_data1 = [];
            for ($j = 0; $j < count($exam_name); $j++) {

                if (isset($exam_name[$j])) {
                    if (isset($request->marksheet[$j])) {
                        $file_name1 = date('mdYHis') . uniqid() . '.' . $request->marksheet[$j]->extension();

                        request()->marksheet[$j]->move(public_path('assets/images/'), $file_name1);
                    } else {
                        $file_name1 = null;
                    }
                    $data = array(
                        'exam_name' => $exam_name[$j],
                        'subject_name'  => $subject_name[$j],
                        'bord_university'  => $bord_university[$j],
                        'roll_no'  => $roll_no[$j],
                        'result'  => $result[$j],
                        'passing_year'  => $passing_year[$j],
                        'percentage'  => $percentage[$j],
                        'marksheet'  => $file_name1,

                        'user_id' => $userId
                    );
                    $insert_data1[] = $data;
                }
            }
            Qualification::insert($insert_data1);

            $exam_name1 = $request->exam_name1;
            $bord_university1 = $request->board_name1;
            $passing_year1 = $request->passing_year1;

            $insert_data2 = [];
            for ($k = 0; $k < count($exam_name1); $k++) {
                if (isset($exam_name1[$k])) {
                    if (isset($request->marksheet1[$k])) {
                        $file_name2 = date('mdYHis') . uniqid() . '.' . $request->marksheet1[$k]->extension();

                        request()->marksheet1[$k]->move(public_path('assets/images/'), $file_name2);
                    } else {
                        $file_name2 = null;
                    }
                    $data1 = array(
                        'exam_name' => $exam_name1[$k],
                        'board_name'  => $bord_university1[$k],
                        'passing_year'  => $passing_year1[$k],
                        'marksheet'  => $file_name2,

                        'user_id' => $userId
                    );
                    $insert_data2[] = $data1;
                }
            }
            ApplicantItKnowledge::insert($insert_data2);


            $job_nature = $request->job_nature;
            $organisastion_name = $request->orgnisastion_name;
            $post_name = $request->post_name;
            $start_date = $request->from;
            $end_date = $request->to;
            $total_exp = $request->total_experience;

            $insert_data = [];
            for ($i = 0; $i < count($job_nature); $i++) {
                if (isset($job_nature[$i])) {
                    $data = array(
                        'job_nature' => $job_nature[$i],
                        'organisastion_name'  => $organisastion_name[$i],
                        'post_name'  => $post_name[$i],
                        'start_date'  => $start_date[$i],
                        'end_date'  => $end_date[$i],
                        'total_exp'  => $total_exp[$i],

                        'user_id' => $userId


                    );
                    $insert_data[] = $data;
                }
            }

            Experience::insert($insert_data);

            return redirect()->route('previewpage', $userId)->with('success', 'Form has been created successfully.');
        }
    }


    public function Preview($userId)
    {
        $userData = JobApplicant::where('id', $userId)->first();
        $category = Category::where('id', $userData->category)->first();
        $applicant_district = ApplicantDistrict::where('user_id', $userId)->pluck('district_id')->toarray();
        $districts = District::whereIn('id', $applicant_district)->get();
        $applicant_experience = Experience::where('user_id', $userId)->get();
        $applicant_qualification = Qualification::where('user_id', $userId)->get();
        $applicant_itknowledge = ApplicantItKnowledge::where('user_id', $userId)->get();

        $job_name = Job::where('id', $userData->job_id)->first();
        return view('Front/Pages/formShowPage', compact('userData', 'applicant_district', 'applicant_experience', 'applicant_qualification', 'applicant_itknowledge', 'category', 'districts', 'job_name'))->with('success', 'Form Submitted Succesfully.');
    }
}
