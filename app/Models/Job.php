<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'state_id',
        'district_id',
        'department_id',
        'job_title',
        'salary',
        'no_of_post',
        'start_date',
        'end_date',
        'status',
    ];

    public function getDepartment()
    {
        return $this->belongsTo(Department::class, 'department_id',);
    }
}
