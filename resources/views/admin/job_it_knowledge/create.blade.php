@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">Add It Knowledge ID
                  <a class="btn btn-primary btn-sm float-end" href="{{route('admin.job_it_knowledge.index')}}" enctype="multipart/form-data"> Back</a>
              </div>
              <div class="card-body">
                  <form action="{{route('admin.job_it_knowledge.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <div class="col-sm-12">

                             
                              <div class="row mb-6">
                                  <label class="col-sm-4 col-label-form">Job Name:<span class="required">*</span></label>
                                  <div class="col-sm-7">
                                    <select id="job_id" name="job_id" class="form-control">
                                        <option value="">-- Select Job --</option>
                                        @foreach ($job as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->job_title}}
                                        </option>
                                        @endforeach
                                    </select>                               
                                  </div>
                              </div>

                              <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">It Knowledge Name:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                  <select id="it_knowledge_id" name="it_knowledge_id" class="form-control">
                                      <option value="">-- Select It Knowledge --</option>
                                      @foreach ($itknowledge as $data)
                                      <option value="{{$data->id}}">
                                          {{$data->title}}
                                      </option>
                                      @endforeach
                                  </select>                               
                                </div>
                            </div>

                              <div class="row mb-6 mt-3">
                                  <label class="col-sm-4 col-label-form">Status:<span class="required">*</span></label>
                                  <div class="col-sm-7">
                                      <input type="checkbox" id="status" name="status" checked placeholder="Status" class="checkbox">
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
<style>
  .required{
    color:red;
  }
  </style>
    @endsection
