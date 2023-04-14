@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Department
                    <a href="{{ route('admin.department.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
                <div class="card-body">

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Department Name</b></label>
                        <div class="col-sm-10">
                            {{ ucfirst($department->name) }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>State Name</b></label>
                        <div class="col-sm-10">
                            {{getStateName($department->state_id) }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>District Name</b></label>
                        <div class="col-sm-10">
                            <?php
                            $department_name = getJobDepartmentName($department->id);


                            ?>
                            @foreach($department_name as $data)
                            {{ $data}},
                            @endforeach


                        </div>
                    </div>





                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Status</b></label>
                        <div class="col-sm-10">
                            {{ $department->status=='1' ? 'Active':'Inactive' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection