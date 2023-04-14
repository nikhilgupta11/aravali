<?php

namespace App\Models;

use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;
    public $table = 'job_applicants';
    public function setCatAttribute($value)
    {
        $this->attributes['district'] = json_encode($value);
    }

    /**
     * Get the categories 
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['district'] = json_decode($value);
    }

    public function getState()
    {
        return $this->belongsTo(State::class, 'state');
    }

    public function getStateAttribute($value)
    {
        return State::find($value)->name;
    }

    // public function getDepartmentAttribute($value)
    // {
    //     return Department::find($value)->name;
    // }

    public function getDistrict()
    {
        return $this->belongsToMany(District::class, 'applicant_districts', 'user_id', 'district_id');
    }

    public function getJob()
    {
        return $this->belongsTo(Job::class, 'job_id',);
    }
}
