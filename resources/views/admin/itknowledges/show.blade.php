@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">It knowledge Details
                    <a href="{{ route('admin.itknowledges.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form"><b>Title</b></label>
                        <div class="col-sm-10">
                            
                            {{ $itknowledge->title }}
                            
                        </div>
                    </div>
                  
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Status</b></label>
                        <div class="col-sm-10">
                            {{ $itknowledge->status=='0' ? 'Active':'Inactive' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection