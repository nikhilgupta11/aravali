@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">Edit Country
                    <a class="btn btn-primary btn-sm float-end" href="{{ route('admin.countries.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.countries.update',$country->id) }}" method="POST" enctype="multipart/form-data" id="add-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="row mb-6">
                                    <label class="col-sm-4 col-label-form">Country Name:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="country_name" value="{{$country->country_name}}" class="form-control @error('country_name') is-invalid @enderror" placeholder="Country Name">

                                    </div>
                                </div>

                                <div class="row mb-6 mt-3">
                                    <label class="col-sm-4 col-label-form">Status:<span class="required">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="checkbox" id="status" name="status" {{ $country->status=='1' ? 'checked':'' }} placeholder="Status" class="checkbox">
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<script>
    if ($("#add-data").length > 0) {
        $("#add-data").validate({
            rules: {
                country_name: {
                    required: true,
                    maxlength: 50
                },

            },
            messages: {
                country_name: {
                    required: "Please enter country name",
                },

            },
        })
    }
</script>
@endsection