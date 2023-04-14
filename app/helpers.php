<?php

use App\Models\Category;
use App\Models\Country;
use App\Models\Department;
use App\Models\DepartmentDistrict;
use App\Models\District;
use App\Models\Eligibility;
use App\Models\State;
use App\Models\Homecontent;
use App\Models\Itknowledge;
use App\Models\Job;
use App\Models\JobDistrict;
use App\Models\JobEligibility;
use App\Models\JobITKnowledge;

if (!function_exists('getStateName')) {
   function getStateName($id)
   {
      $state_name = State::where('id', $id)->pluck('name')->toArray();

      if (isset($state_name[0])) {
         return $state_name[0];
      } else {
         return 'N/A';
      }
   }
}
if (!function_exists('getDistrictName')) {
   function getDistrictName($id)
   {
      $district_name = District::where('id', $id)->pluck('name')->toArray();

      if (isset($district_name[0])) {
         return $district_name[0];
      } else {
         return 'All';
      }
   }
}



if (!function_exists('getAppplicantDistrict')) {
   function getAppplicantDistrict($id)
   {
 
      $district_name = District::where('id', $id)->pluck('name')->toArray();


      if (isset($district_name[0])) {
         return $district_name[0];
      } else {
         return '';
      }
   }
}


if (!function_exists('getJobDistrictName')) {
   function getJobDistrictName($id)
   {
      $district_name = JobDistrict::where('job_id', $id)->pluck('district_name')->toArray();


      if (!empty($district_name)) {
         return $district_name;
         

      } else {
         return 'All';
      }
   }
}


if (!function_exists('getJobDistrictNameForJob')) {
   function getJobDistrictNameForJob($id)
   {
      $district_name = JobDistrict::where('job_id', $id)->get();


      if (!empty($district_name)) {
         return $district_name;
         

      } else {
         return 'All';
      }
   }
}

if (!function_exists('getJobDepartmentName')) {
   function getJobDepartmentName($id)
   {

      $district_name = DepartmentDistrict::where('department_id', $id)->pluck('district_name')->toArray();

      if (!empty($district_name)) {
         return $district_name;
      } else {
         return 'All';
      }
   }
}


if (!function_exists('getJobName')) {
   function getJobName($id)
   {

      $job_name = Job::where('id', $id)->pluck('job_title')->toArray();

      if (isset($job_name[0])) {
         return $job_name[0];
      } else {
         return 'N/A';
      }
   }
}
if (!function_exists('getCategoryName')) {
   function getCategoryName($id)
   {
      $job_name = Category::where('id', $id)->pluck('category')->toArray();

      if (isset($job_name[0])) {
         return $job_name[0];
      } else {
         return 'N/A';
      }
   }
}
if (!function_exists('getNationalityName')) {
   function getNationalityName($id)
   {
      
      $job_name = Country::where('id', $id)->pluck('country_name')->toArray();

      if (isset($job_name[0])) {
         return $job_name[0];
      } else {
         return 'N/A';
      }
   }
}
if (!function_exists('getStateName')) {
   function getNationalityName($id)
   {
      $job_name = State::where('id', $id)->pluck('name')->toArray();

      if (isset($job_name[0])) {
         return $job_name[0];
      } else {
         return 'N/A';
      }
   }
}
if (!function_exists('getDistrictName')) {
   function getNationalityName($id)
   {
      $job_name = District::where('id', $id)->pluck('name')->toArray();

      if (isset($job_name[0])) {
         return $job_name[0];
      } else {
         return 'N/A';
      }
   }
}



if (!function_exists('getEligibilityName')) {
   function getEligibilityName($id)
   {
      $eligibility_name = Eligibility::where('id', $id)->pluck('title')->toArray();

      if (isset($eligibility_name[0])) {
         return $eligibility_name[0];
      } else {
         return 'N/A';
      }
   }
}


if (!function_exists('getJobEligibility')) {
   function getJobEligibility($id)
   {
      $eligibility_name = JobEligibility::where('job_id', $id)->get();

      return $eligibility_name;
   }
}


if (!function_exists('getItKnowledgeName')) {
   function getItKnowledgeName($id)
   {
      $eligibility_name = Itknowledge::where('id', $id)->pluck('title')->toArray();

      if (isset($eligibility_name[0])) {
         return $eligibility_name[0];
      } else {
         return 'N/A';
      }
   }
}


if (!function_exists('getJobItKnowledge')) {
   function getJobItKnowledge($id)
   {
      $Itknowledge = JobITKnowledge::where('job_id', $id)->get();

      return $Itknowledge;
   }
}

if (!function_exists('getItknowledgeName')) {
   function getItknowledgeName($id)
   {
      $it_knowledge = Itknowledge::where('id', $id)->pluck('title')->toArray();

      if (isset($it_knowledge[0])) {
         return $it_knowledge[0];
      } else {
         return 'N/A';
      }
   }
}


if (!function_exists('getDepartmentNameForApplicant')) {
   function getDepartmentNameForApplicant($id)
   {
      $department_id = Job::where('id', $id)->pluck('department_id')->toArray();
      $department_name = '';
     if(isset($department_id[0])){
      $department_name =  getDepartmentName($department_id[0]);
     }
      
      return $department_name;
   }
}
if (!function_exists('getDepartmentName')) {
   function getDepartmentName($id)
   {
      $department_name = Department::where('id', $id)->pluck('name')->toArray();

      if (isset($department_name[0])) {
         return $department_name[0];
      } else {
         return 'N/A';
      }
   }
}

// if (!function_exists('getDateFormat')) {
//    function getDateFormat($id)
//    {
//       $date_formate = Job::where('id', $id)->pluck('created_at');
//       $date_formate = $date_formate[0]->format('d/m/Y');
//       $data = gettype($date_formate);
//       return $date_formate;

//       Use preg_split() function
//       $string = "date_formate";
//       $str_arr = preg_split("/\\/", $string);
//       print_r($str_arr);

//       use of explode
//       $string = "123,46,78,000";
//       $str_arr = explode(",", $string);
//       print_r($str_arr);
//    }
// }
