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
                <div class="card-header">Edit Department
                    <a class="btn btn-primary btn-sm float-end" href="{{ route('admin.department.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.department.update',$department->id) }}" id="add-data" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                      <div class="row">
                        <div class="col-sm-12">
                            <div class="row mb-6 mt-2">
                              
                                <label class="col-sm-4 col-label-form">Select Country:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                <select id="country_id" name="country_id" class="form-control">
                                    <option value="" disabled>-- Select Country --</option>
                                    @foreach ($country as $data)
                                   
                                    <option value="{{$data->id}}" {{ $data->id == $department->country_id  ? 'selected' : '' }}>
                                        {{$data->country_name}}
                                       
                                        @endforeach
                                        
                                </select>
                                    @error('country_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row mb-6 mt-2">
                                
                                <label class="col-sm-4 col-label-form">Select State:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <select id="state_id" name="state_id" class="form-control">
                                        <option value="" disabled>-- Select State --</option>
                                        @foreach ($state as $data)
                                        <option value="{{$data->id}}"
                                                {{ $data->id == $department->state_id  ? 'selected' : '' }}

                                                >
                                                {{$data->name}}
                                        </option>
                                        @endforeach
        
                                    </select>
                                    @error('state_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                           <div class="col-sm-12 district_data">
                            <div class="row mb-6">
                                <label class="col-sm-4 col-label-form">Select District:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <select id="district_id" name="district_id[]" multiple class="form-control js-select2">
                                  
  
                                        @foreach($district as $data)
                                                  
                                        <option value="{{ $data->id }}" {{ (in_array($data->id, $selected_district)) ? 'selected' : '' }}>{{ $data->name}}</option>

                                      @endforeach
                                    </select>
                                    @error('district_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                           </div>
                            <div class="col-sm-12">
                                <div class="row mb-6 mt-2">
                                    <label class="col-sm-4 col-label-form">Department Name:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="department_name" value="{{ $department->name }}" class="form-control @error('state_name') is-invalid @enderror" placeholder="District Name">
                                        @error('department_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                             
                           <div class="col-sm-12">
                            <div class="row mb-6 mt-2">
                                
                                <div class="col-sm-7">
                                    <input  name="alldepartment" type="hidden" {{count($selected_district) == 0 ? 'checked' : ''}}  class="alldepartment">                           
                                </div>

                              
                            </div>
                            <div class="row mb-6 mt-3">
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-label-form">Status:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="status" name="status" {{ $department->status=='1' ? 'checked':'' }} placeholder="Status" class="checkbox">
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

                                </div>
                                <div class="text-center">
                                    <input type="submit" id="Save" class="btn btn-primary" value="Save" />
    
                                </div>
                            </div>

                                
                               
                               
                        
                            </div>

                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
      $("#district_id").click(function(){
       
        $(".alldepartment").prop("checked", false);
    });
    $(".alldepartment").on('click',function(){
        if($(this).is(":checked")) {
            $(".district_data").hide();
        }else{
            $(".district_data").show();
        }
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                    $('#district_id').html('<option value="">-- Select State --</option>');
                    $.each(result.states, function (key, value) {
                        $("#district_id").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                   
                }
            });
        });
    });
    </script>
@endsection
@section('footer-scripts')

@endsection