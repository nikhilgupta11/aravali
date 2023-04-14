<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobITKnowledge extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_id',
        'it_knowledge_id',
        'status',
    ];
}
