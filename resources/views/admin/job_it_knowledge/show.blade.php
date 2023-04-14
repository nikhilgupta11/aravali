@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Job IT knowledge
                    <a href="{{ route('admin.job_it_knowledge.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
                <div class="card-body">
                  
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Job Name</b></label>
                        <div class="col-sm-10">
                            {{$job_it_knowledge->job_id}}
                            {{getJobName($job_it_knowledge->job_id)  }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>It Knowledge</b></label>
                        <div class="col-sm-10">
                            {{getItknowledgeName($job_it_knowledge->it_knowledge_id)  }}
                        </div>
                    </div>

                  
                    
                   
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Status</b></label>
                        <div class="col-sm-10">
                            {{ $job_it_knowledge->status=='0' ? 'Active':'Inactive' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection