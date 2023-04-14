@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Job Detail
                    <a href="{{ route('admin.jobs.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
                <div class="card-body">
                  
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Job Title</b></label>
                        <div class="col-sm-10">
                            {{ ucfirst($job->job_title) }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>State Name</b></label>
                        <div class="col-sm-10">
                            {{getStateName($job->state_id)  }}
                        </div>
                    </div>
                  

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>District Name</b></label>
                        <div class="col-sm-10">
                            <?php
                            $district_name = getJobDistrictName($job->id);
                          

                            ?>
                            @foreach($district_name as $data)
                              {{ $data}},
                            @endforeach
                            
                          
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Department Name</b></label>
                        <div class="col-sm-10">
                            {{getDepartmentName($job->department_id)  }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Eligibility</b></label>
                        <div class="col-sm-10">
                    <?php
                    $eligibility =    getJobEligibility($job->id);
                    ?>
                        @foreach($eligibility as $data)
                      
                               {{ getEligibilityName($data->eligibility_id)}},
                            

                        @endforeach 
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>It Skill</b></label>
                        <div class="col-sm-10">
                    <?php
                    $Itknowledge =    getJobItKnowledge($job->id);
                    ?>
                        @foreach($Itknowledge as $data)
                      
                               {{ getItKnowledgeName($data->it_knowledge_id)}},
                            

                        @endforeach 
                        </div>
                    </div>



                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>No Of Post</b></label>
                        <div class="col-sm-10">
                            {{ ($job->no_of_post) }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Start Date</b></label>
                        <div class="col-sm-10">
                            {{ ($job->start_date) }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>End Date</b></label>
                        <div class="col-sm-10">
                            {{ ($job->end_date) }}
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>experience</b></label>
                        <div class="col-sm-10">
                            {{ ($job->experience) }}
                        </div>
                    </div>


                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Description</b></label>
                        <div class="col-sm-10">
                            {{ ($job->description) }}
                        </div>
                    </div>

                       
                    
                   
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Status</b></label>
                        <div class="col-sm-10">
                            {{ $job->status == 0 ? 'Inactive':'Active' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection