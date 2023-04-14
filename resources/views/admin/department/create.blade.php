@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
   
	<style>
		/* example of setting the width for multiselect */
		#district_id_multiSelect {
			width: 100%;
		}
	</style>
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="card">
              <div class="card-header">Add Department
                  <a class="btn btn-primary btn-sm float-end" href="{{route('admin.department.index')}}" enctype="multipart/form-data"> Back</a>
              </div>
       
              <div class="card-body">

                  <form action="{{route('admin.department.store')}}" id="add-data" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="row mb-6">
                                <label class="col-sm-4 col-label-form">Country Name:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <select id="country_id" name="country_id" class="form-control">
                                        <option value="{{$selected_country->id}}">{{$selected_country->country_name}}</option>
                                        @foreach ($country as $data)
                                        <option value="{{$data->id}} ">
                                            {{$data->country_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>
                             
                              <div class="row mb-6 mt-2">
                                  <label class="col-sm-4 col-label-form">State Name:<span class="required">*</span></label>
                                  <div class="col-sm-7">
                                    <select id="state_id" name="state_id" class="form-control">
                                        <option value="{{$selected_state->id}}">{{$selected_state->name}}</option>
                                    </select>   
                                    @error('state_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror                                
                                  </div>
                              </div>

                              <div class="row mb-6 district_data mt-3">
                                <label class="col-sm-4 col-label-form">District Name:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                  <select id="district_id" name="district_id[]" multiple class="form-control js-select2">
                                    @foreach ($district as $data)
                                    <option value="{{$data->id}} ">
                                        {{$data->name}}
                                    </option>
                                    @endforeach
                                  </select>  
                                  @error('district_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror                             
                                </div>

                            </div>

                            <div class="row mb-6">
                                
                                 <div class="col-sm-7">
                                    <input  checked="checked" name="alldepartment" type="hidden" class="alldepartment">                           
                                    
                                </div>

                              
                            </div>

                              <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Department Name:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="department_name" id="department_name" class="form-control @error('department_name') is-invalid @enderror"  placeholder="Department Name">
                                    @error('department_name')
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

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
                department_name: {
                    required: true,
                   
                },


            },
            messages: {
                country_id: {
                    required: "Please select country",
                },
                state_id: {
                    required: "Please select state",
                },
                district_id: {
                    required: "Please select district",
                },
                department_name: {
                    required: "Please enter department name",
                },
            },
        })
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

      
        $('#state_id').on('change', function () {
            var state_id = this.value;
         
            $.ajax({
                url: "{{url('admin/fetch-district')}}",
                type: "POST",
                data: {
                    state_id: state_id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                  
                    $.each(result.states, function (key, value) {
                        $("#district_id").append('<option value="' + value
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

</script>
<style>
  .required{
    color:red;
  }
  </style>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
  <script>
//       $(".district_data").hide();
//     $(".multiselect-checkbox").on('click',function(){
//         if($(this).is(":checked")) {
//             alert(1);
//             $(".district_data").hide();
//         }else{
//             $(".district_data").show();
//         }
// });





    </script>
    <script>
		document.multiselect('#district_id')
			.setCheckBoxClick("checkboxAll", function(target, args) {
				console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
              if(args.checked == true){
                $(".alldepartment").val(1);
              }else{
                $(".alldepartment").val('');
              }
                
			})
			.setCheckBoxClick("1", function(target, args) {
				console.log("Checkbox for item with value '1' was clicked and got value ", args.checked);
                
			});

		function enable() {
			document.multiselect('#district_id').setIsEnabled(true);
		}

		function disable() {
			document.multiselect('#district_id').setIsEnabled(false);
		}
	</script>
    @endsection
