<?php
namespace App\Exports;

use App\Models\ApplicantDistrict;
use App\Models\Category;
use App\Models\District;
use App\Models\JobApplicant;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ApplicantExport implements FromArray, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {
        $data = JobApplicant::with(['getDistrict','getJob.getDepartment'])->select(
            "job_applicants.id",
            "name",
            "father_name",
            "mother_name",
            "email",
            "birth_date",
            "age",
            "martial_status",
            "gender",
            "mobile_no",
            "aadhar_number",
            "correspondence_address",
            "parmanent_address",
            "jobs.job_title",
            "categories.category",
            "countries.country_name",
            "state",

            "job_applicants.job_id",
            // "applicant_districts.district_id",
            //"departments.name"
        )
            ->join('jobs', 'job_applicants.job_id', '=', 'jobs.id')
            ->join('categories', 'job_applicants.category', '=', 'categories.id')
            ->join('countries', 'job_applicants.nationality', '=', 'countries.id')
           // ->join('departments', 'job_applicants.job_id', '=', 'departments.id')
            // ->join('applicant_districts', 'job_applicants.id', '=', 'applicant_districts.user_id')
            ->get();
     //   echo '<pre>';
       // print_r($data) ;
       // die;
       
       foreach ($data as $key => $value) {
            unset($data[$key]['id']);
            unset($data[$key]['job_id']);
            $data[$key]['district'] = implode(",",$value->getDistrict->pluck('name')->toArray() ?? []);
            $data[$key]['department_name'] = $value->getJob->getDepartment->name ?? '';

       }

       
     
        


        // $job_name = JobApplicant::select("jobs.job_title")->join('jobs', 'job_applicants.job_id', '=', 'jobs.id')->get();

        // $cateogry = JobApplicant::select("categories.category")->join('categories', 'job_applicants.category', '=', 'categories.id')->get();
        // echo '<pre>';
        // print_r($cateogry) ;
        // print_r($job_name) ;
        // die;
        // $id = JobApplicant::pluck("id")->toarray();
        // $applicant_district = ApplicantDistrict::whereIn('user_id', $id)->get()->groupBy(function ($data) {
        // return $data->name;
        // });
        // $nationality = "India";
        // $state = "Rajasthan";
        // $insert_data2 = [];
        // for ($j = 0; $j <= count($applicant_district); $j++) {

        // $data1 = array(
        // 'district' => $applicant_district[$j],
        // 'country' => $nationality,
        // 'state' => $state
        // );
        // $insert_data2[] = $data1;
        // }

        // $state = ["Rajasthan"];

        $combined_data = [...$data];


        return $combined_data;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Applicant Name", "Father Name", "Mother Name", "Email", "DOB", "Age", "Marital Status", "Gender", "Mobile Number", "Aadhar Number", "Correspondence Add.", "Parmanent Add.", "Job Name", "Category", "Country", "State" , "Applicant District", "Department Name"];
    }
}