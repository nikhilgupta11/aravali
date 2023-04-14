@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">District
                    <a href="{{ route('admin.district.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
                <div class="card-body">
                  
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>State Name</b></label>
                        <div class="col-sm-10">
                            {{getStateName($district->state_id)  }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>District Name</b></label>
                        <div class="col-sm-10">
                            {{ ucfirst($district->name) }}
                        </div>
                    </div>

                  
                    
                   
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Status</b></label>
                        <div class="col-sm-10">
                            {{ $district->status=='0' ? 'Active':'Inactive' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection