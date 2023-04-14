<?php

namespace App\Exports;

use App\Models\ApplicantDistrict;
use App\Models\ApplicantItKnowledge;
use App\Models\Experience;
use App\Models\Job;
use App\Models\JobApplicant;
use App\Models\Qualification;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ApplicantDetail implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // $data_array[] = array("job", "qualification", "exp", "app_district", "app_oth");

        // $user = JobApplicant::where('id', $id)->first();
        // $job = Job::where('id', $user->job_id)->first();
        // $qualification = Qualification::where('user_id', $user->id)->get();
        // $experience = Experience::where('user_id', $id)->get();
        // $applicant_district = ApplicantDistrict::where('user_id', $user->id)->get();
        // $applicant_other_qualification = ApplicantItKnowledge::where('user_id', $user->id)->get();

        // $Data = [];
        // $Data['job'] = $job;
        // $Data['qualification'] = $qualification;
        // $Data['exp'] = $experience;
        // $Data['app_district'] = $applicant_district;
        // $Data['app_oth'] = $applicant_other_qualification;

        // echo $Data;
        // die;
        // return $Data;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function headings(): array
    {
        return ["Applicant Name", "Job Name"];
    }
}
