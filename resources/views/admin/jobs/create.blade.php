@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <?php
    //print_r($errors->all());

        ?>
    <style>
		/* example of setting the width for multiselect */
		#district_id_multiSelect {
			width: 100%;
		}
        #eligibility_id_multiSelect {
			width: 100%;
		}
        #it_knowledge_id_multiSelect {
			width: 100%;
		}
	</style>
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">Add Job
                  <a class="btn btn-primary btn-sm float-end" href="{{route('admin.jobs.index')}}" enctype="multipart/form-data"> Back</a>
              </div>
              <div class="card-body">
                  <form action="{{route('admin.jobs.store')}}" id="add-data" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="row mb-6">
                                <label class="col-sm-4 col-label-form">Country Name:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                  <select id="country_id" name="country_id" class="form-control">
                                    <option value="{{$selected_country->id}}">{{$selected_country->country_name}}</option>
                                    @foreach ($country as $data)
                                      <option value="{{$data->id}}">
                                          {{$data->country_name}}
                                      </option>
                                      @endforeach
                                  </select>                               
                                </div>
                            </div>
                             
                              <div class="row mb-6 mt-2">
                                  <label class="col-sm-4 col-label-form">State Name:<span class="required">*</span></label>
                                  <div class="col-sm-7 mt-2">
                                    <select id="state_id" name="state_id" class="form-control">
                                        <option value="{{$selected_state->id}}">{{$selected_state->name}}</option>
                                        @foreach ($state as $data)
                                        <option value="{{$data->id}}">
                                            {{$data->name}}
                                        </option>
                                        @endforeach
                                    </select>                               
                                  </div>
                              </div>
                              <div class="row mb-6">
                                <label class="col-sm-4 col-label-form">Department Name:<span class="required">*</span></label>
                                <div class="col-sm-7 mt-2">
                                  <select id="department_id" name="department_id" class="form-control">
                                      <option value="">-- Select Department --</option>
                                      @foreach ($department as $data)
                                      <option value="{{$data->id}}">
                                          {{$data->name}}
                                      </option>
                                      @endforeach
                                  </select>                               
                                </div>
                            </div>
                              <div class="row mb-6 district_data">
                                <label class="col-sm-4 col-label-form">District Name:<span class="required">*</span></label>
                                <div class="col-sm-7 mt-2">
                                  <select id="district_id" name="district_id[]" multiple class="form-control ">
                                     
                                      @foreach ($district as $data)
                                      <option value="{{$data->id}}">
                                          {{$data->name}}
                                      </option>
                                      @endforeach
                                  </select>                               
                                </div>

                            </div>
                          
                            <div class="row mb-6">

                                <div class="col-sm-7">
                                    <input name="alldepartment" type="hidden"  class="alldepartment">                           
                                </div>

                              
                            </div>
                            
                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Job Eligibility:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                  <select id="eligibility_id" name="eligibility_id[]" multiple class="form-control js-select2">
                                     
                                      @foreach ($eligibility as $data)
                                      <option value="{{$data->id}}">
                                          {{$data->title}}
                                      </option>
                                      @endforeach
                                  </select>                               
                                </div>

                            </div>
                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Job It Skills:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                  <select id="it_knowledge_id" name="it_knowledge_id[]" multiple class="form-control js-select2">
                                      
                                      @foreach ($itknowledge as $data)
                                      <option value="{{$data->id}}">
                                          {{$data->title}}
                                      </option>
                                      @endforeach
                                  </select>                               
                                </div>

                            </div>
                              <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Job title:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="job_title" class="form-control @error('job_title') is-invalid @enderror"  placeholder="Job Title">
                                    @error('job_title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                            </div>
                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">No Of Post:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="no_of_post" class="form-control @error('no_of_post') is-invalid @enderror"  placeholder="No Of Post">
                                    @error('no_of_post')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                            </div>

                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Salary:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="salary" class="form-control @error('salary') is-invalid @enderror"  placeholder="Salary">
                                    @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                            </div>

                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Start Date:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <input type="datetime-local" name="start_date" class="form-control @error('start_date') is-invalid @enderror"  placeholder="Start Date">
                                    @error('start_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                            </div>
                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">End Date:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <input type="datetime-local" name="end_date" class="form-control @error('end_date') is-invalid @enderror"  placeholder="End Date">
                                    @error('end_date')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                          
                            </div>
                       
                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Description:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <textarea name="description" id="description" class="form-control" @error('description') is-invalid @enderror" >
                                       Please Enter Description
                                    </textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
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

                          <div class="text-center mt-3">
                              <input type="submit" id="Save" class="btn btn-primary" value="Save" />

                          </div>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <script>
    $(".alldepartment").on('click', function() {
        if ($(this).is(":checked")) {
            $(".district_data").hide();
        } else {
            $(".district_data").show();
        }
    });
</script>
  <script>
      if ($("#add-data").length > 0) {
          $("#add-data").validate({
              rules: {
                  country_id: {
                      required: true,
                     
                  },
                  state_id: {
                      required: true,
                     
                  },
                    district_id: {
                      required: true,
                     
                  },
                  department_id: {
                      required: true,
                     
                  },
                  it_knowledge_id: {
                      required: true,
                     
                  },
                  eligibility_id: {
                      required: true,
                  },
                  job_title: {
                      required: true,
                     
                  },
                  no_of_post: {
                      required: true,
                     
                  },
                  salary: {
                      required: true,
                     
                  },
                  start_date: {
                      required: true,
                     
                  },
                  end_date: {
                      required: true,
                     
                  },
                
                  description: {
                      required: true,
                     
                  },
  
              },
              messages: {
                  title: {
                      required: "Please enter It knowledge",
                  },
                
              },
          })
      }
  </script>

<script>
      config = {
     
        dateFormat: 'm-d-Y',
    }
    flatpickr("input[type=datetime-local]");
</script>
<style>
  .required{
    color:red;
  }
  </style>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    document.multiselect('#eligibility_id')
        .setCheckBoxClick("checkboxAll", function(target, args) {
            console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
         
            
        })
        .setCheckBoxClick("1", function(target, args) {
            console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
            
        });

    function enable() {
        document.multiselect('#eligibility_id').setIsEnabled(true);
    }

    function disable() {
        document.multiselect('#eligibility_id').setIsEnabled(false);
    }
</script>
<script>
    document.multiselect('#it_knowledge_id')
        .setCheckBoxClick("checkboxAll", function(target, args) {
            console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
         
            
        })
        .setCheckBoxClick("1", function(target, args) {
            console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
            
        });

    function enable() {
        document.multiselect('#it_knowledge_id').setIsEnabled(true);
    }

    function disable() {
        document.multiselect('#it_knowledge_id').setIsEnabled(false);
    }
</script>
<script>
    $(document).ready(function () {

        /*------------------------------------------
        --------------------------------------------
        Country Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
        $('#country_id').on('change', function () {
            var idCountry = this.value;
           
            $("#state_id").html('');
            $.ajax({
                url: "{{url('admin/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state_id').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#state_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                   
                }
            });
        });

     
        /*------------------------------------------
        --------------------------------------------
        State Dropdown Change Event
        --------------------------------------------
        --------------------------------------------*/
       

    });

    $('#department_id').on('change', function () {
            var department_id = this.value;
         
            $.ajax({
                url: "{{url('admin/fetch-district-department')}}",
                type: "POST",
                data: {
                    department_id: department_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    // console.log(result.district);
                    $('#district_id').html('<option value="" disabled>-- Select District --</option>');
                    $.each(result.district, function (key, value) {
                       
                        $("#district_id").append('<option value="' + value.district_id + '">' + value.district_name + '</option>');
                    });
                   
                }
            });
        });
</script>


    @endsection
