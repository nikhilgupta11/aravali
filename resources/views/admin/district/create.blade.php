@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Add District
                    <a class="btn btn-primary btn-sm float-end" href="{{route('admin.district.index')}}" enctype="multipart/form-data"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.district.store')}}" method="POST" enctype="multipart/form-data" id="add-data">
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
                                    <div class="col-sm-7">
                                        
                                        <select id="state_id" name="state_id" class="form-control">
                                            <option value="{{$selected_state->id}}">{{$selected_state->name}}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-6 mt-2">
                                    <label class="col-sm-4 col-label-form">District Name:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="district_name" class="form-control @error('district_name') is-invalid @enderror" placeholder="District Name">

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
    .required {
        color: red;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                district_name: {
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
                district_name: {
                    required: "Please enter district name ",
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
            $("#state-id").html('');
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
</script>
@endsection