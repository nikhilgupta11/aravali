<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEligibility extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'eligibility_id',
        'status',
    ];
}
