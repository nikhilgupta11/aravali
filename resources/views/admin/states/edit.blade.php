@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Edit State
                    <a class="btn btn-primary btn-sm float-end" href="{{ route('admin.states.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.states.update',$state->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">
                            <div class="row mb-6">
                                <label class="col-sm-4 col-label-form">Country Name:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                 
                                    <select id="country_id" name="country_id" class="form-control">
                                        <option value="">-- Select Country --</option>
                                    
                                        @foreach ($country as $data)
                                        @if($data->id == $state->country_id)
                                        <option selected value="{{$state->country_id}}">
                                            {{$data->country_name}}
                                        </option>
                                        @else
                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            
                          

                                <div class="row mb-6 mt-2">
                                    <label class="col-sm-4 col-label-form">State Name:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="state_name" value="{{$state->name}}" class="form-control @error('state_name') is-invalid @enderror" placeholder="State Name">

                                    </div>
                                </div>
                               

                                <div class="row mb-6 mt-3">
                                    <label class="col-sm-4 col-label-form">Status:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="status" name="status" {{ $state->status=='1' ? 'checked':'' }} placeholder="Status" class="checkbox">
                                        <label for="status" class="toggle">
                                            <p class="togglep">&nbsp;OFF&nbsp;&nbsp;ON&nbsp;</p>
                                        </label>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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