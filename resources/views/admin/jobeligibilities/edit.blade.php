@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Update Job Eligibility
                    <a class="btn btn-primary btn-sm float-end" href="{{ route('admin.jobeligibilities.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.jobeligibilities.update',$jobeligibility->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row mb-6">
                                    <label class="col-sm-4 col-label-form">Select job:<span class="required">*</span></label>
                                    
                                        <select id="job_id" name="job_id" class="form-control">
                                            <option value="">-- Select Job --</option>
                                            @foreach ($job as $data)
                                            <option value="{{$data->id}}"
                                                    {{ $data->id == $jobeligibility->job_id  ? 'selected' : '' }}

                                                    >
                                                    {{$data->job_title}}
                                            </option>
                                            @endforeach
            
                                        </select>
                                        @error('job_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Select Eligibility:<span class="required">*</span></label>
                                        
                                            <select id="eligibility_id" name="eligibility_id" class="form-control">
                                                <option value="">-- Select Eligibility --</option>
                                                @foreach ($eligibility as $data)
                                                <option value="{{$data->id}}"
                                                        {{ $data->id == $jobeligibility->eligibility_id  ? 'selected' : '' }}
    
                                                        >
                                                        {{$data->title}}
                                                </option>
                                                @endforeach
                
                                            </select>
                                            @error('eligibility_id')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                </div>
                              
                                <div class="col-sm-6">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-label-form">Status:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="status" name="status" {{ $jobeligibility->status=='0' ? 'checked':'' }} placeholder="Status" class="checkbox">
                                        <label for="status" class="toggle">
                                            <p class="togglep">&nbsp;OFF&nbsp;&nbsp;ON&nbsp;</p>
                                        </label>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" id="Save" class="btn btn-primary" value="Save" />

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')

@endsection