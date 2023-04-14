@extends('layout.admin.layout')

@section('content')
    <div class="content-wrapper">
        <style>
            /* example of setting the width for multiselect */

            #eligibility_id_multiSelect {
                width: 100%;
            }

            #it_knowledge_id_multiSelect {
                width: 100%;
            }
        </style>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">Edit Job
                        <a class="btn btn-primary btn-sm float-end" href="{{ route('admin.jobs.index') }}"
                            enctype="multipart/form-data"> Back</a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.jobs.update', $job->id) }}" id="add-data" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Job Title:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7">
                                            <input type="text" name="job_title" value="{{ $job->job_title }}"
                                                class="form-control @error('job_title') is-invalid @enderror"
                                                placeholder="Job Title">
                                            @error('job_title')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row mb-6 ">
                                        <label class="col-sm-4 col-label-form">Country Name:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <select id="country_id" name="country_id" class="form-control">
                                                <option value="">-- Select Country --</option>
                                                @foreach ($country as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $job->country_id ? 'selected' : '' }}>
                                                        {{ $data->country_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row mb-6 ">
                                        <label class="col-sm-4 col-label-form">Select State:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <select id="state_id" name="state_id" class="form-control">
                                                <option value="">-- Select State --</option>
                                                @foreach ($state as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $job->state_id ? 'selected' : '' }}>
                                                        {{ $data->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('state_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Select Department:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <select id="department_id" name="department_id" class="form-control js-select2">
                                                <option value="">-- Select Department --</option>
                                                @foreach ($department as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ $data->id == $job->department_id ? 'selected' : '' }}>
                                                        {{ $data->name }}
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
                                        <label class="col-sm-4 col-label-form">Select District:
                                            <span class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">

                                            <select id="district_id" name="district_id[]" multiple class="form-control">

                                                <option value="" selected disabled>Select District</option>


                                                @foreach ($district as $data)
                                                    <option value="{{ $data->district_id }}"
                                                        {{ in_array($data->district_id, $selected_district) ? 'selected' : '' }}>
                                                        {{ $data->district_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label class="col-sm-4 col-label-form">

                                        <input name="alldepartment" type="hidden" value="1" class="alldepartment"
                                            {{ count($selected_district) == 0 ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Salary:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <input type="text" name="salary" value="{{ $job->salary }}"
                                                class="form-control @error('salary') is-invalid @enderror"
                                                placeholder="Salary">
                                            @error('salary')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Eligibility:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">

                                            <select id="eligibility_id" name="eligibility_id[]" multiple
                                                class="form-control js-select2">
                                                <option value="">-- Select Eligibility --</option>

                                                @foreach ($eligibility as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ in_array($data->id, $job_eligibility_id) ? 'selected' : '' }}>
                                                        {{ $data->title }}</option>
                                                @endforeach

                                            </select>

                                            @error('eligibility_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Select It Skill:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <select id="it_knowledge_id" name="it_knowledge_id[]" multiple
                                                class="form-control js-select2">
                                                <option value="">-- Select It Skill --</option>

                                                @foreach ($itknowledge as $data)
                                                    <option value="{{ $data->id }}"
                                                        {{ in_array($data->id, $itknowledge_id) ? 'selected' : '' }}>
                                                        {{ $data->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('it_knowledge_id')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">No Of Post:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <input type="text" name="no_of_post" value="{{ $job->no_of_post }}"
                                                class="form-control @error('no_of_post') is-invalid @enderror"
                                                placeholder="No Of Post">
                                            @error('no_of_post')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">Start Date:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <input type="datetime-local" name="start_date"
                                                value="{{ old('start_date') ?? date('Y-m-d\TH:i', strtotime($job->start_date)) }}"
                                                class="form-control @error('start_date') is-invalid @enderror"
                                                placeholder="Start Date">
                                            @error('start_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">


                                <div class="col-sm-12">
                                    <div class="row mb-6">
                                        <label class="col-sm-4 col-label-form">End Date:<span
                                                class="required">*</span></label>
                                        <div class="col-sm-7 mt-2">
                                            <input type="datetime-local" name="end_date"
                                                value="{{ old('end_date') ?? date('Y-m-d\TH:i', strtotime($job->end_date)) }}"
                                                class="form-control @error('end_date') is-invalid @enderror"
                                                placeholder="End Date">
                                            @error('end_date')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-6 mt-2">
                                <label class="col-sm-4 col-label-form">Description:<span class="required">*</span></label>
                                <div class="col-sm-7">
                                    <textarea name="description" id="description" class="form-control" @error('description') is-invalid @enderror">
                                        {{ $job->description }}
                                    </textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-12 ">
                                <div class="row mb-6">
                                    <label class="col-sm-4 col-label-form">Status:<span class="required">*</span></label>
                                    <div class="col-sm-7 mt-2">
                                        <input type="checkbox" id="status" name="status"
                                            {{ $job->status == '1' ? 'checked' : '' }} placeholder="Status"
                                            class="checkbox">
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

            </div>





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
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(".alldepartment").on('click', function() {
            if ($(this).is(":checked")) {
                $(".district_data").hide();
            } else {
                $(".district_data").show();
            }
        });
        $('.#district_id').on('click', function() {
            alert(1);
            $(".alldepartment").prop("checked", false);
        });
    </script>

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
        $(document).ready(function() {

            /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country_id').on('change', function() {
                var idCountry = this.value;

                $("#state_id").html('');
                $.ajax({
                    url: "{{ url('admin/fetch-states') }}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#state_id').html('<option value="">-- Select State --</option>');
                        $.each(result.states, function(key, value) {
                            $("#state_id").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });

                    }
                });
            });


            $('#state_id').on('change', function() {
                var state_id = this.value;

                $.ajax({
                    url: "{{ url('admin/fetch-district') }}",
                    type: "POST",
                    data: {
                        state_id: state_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(result) {
                        $('#district_id').html(
                            '<option value="">-- Select District --</option>');
                        $.each(result.states, function(key, value) {
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



        $('#department_id').on('change', function() {
            var department_id = this.value;

            $.ajax({
                url: "{{ url('admin/fetch-district-department') }}",
                type: "POST",
                data: {
                    department_id: department_id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result.district);
                    $('#district_id').html('<option value="" disabled>-- Select District --</option>');
                    $.each(result.district, function(key, value) {

                        $("#district_id").append('<option value="' + value.district_id + '">' +
                            value.district_name + '</option>');
                    });

                }
            });
        });
    </script>
@endsection
@section('footer-scripts')
@endsection
