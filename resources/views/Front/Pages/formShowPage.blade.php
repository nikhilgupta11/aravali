@extends('Front/Layouts/Layout/HomeLayout')
@section('HomeContent')
<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card" id="printableArea">
        <div class="card-header">
            <h5><b>{{ ucfirst($job_name->job_title) }}</b></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <b> Applicant Information
                    </b>
                </div>
                <br><br>
                <div class="col-md-4">
                    <b>Name:</b>&nbsp;{{$userData->name}}
                </div>
                <div class="col-md-4">
                    <b>Father's Name:</b>&nbsp;{{$userData->father_name}}
                </div>
                <div class="col-md-4">
                    <b>Mother's Name:</b>&nbsp;{{$userData->mother_name}}
                </div>
                <br>
                <div class="col-md-4">
                    <b>Email:</b>&nbsp;{{$userData->email}}
                </div>
                <div class="col-md-4">
                    <b>Mobile Number:</b>&nbsp;{{$userData->mobile_no}}
                </div>
                <div class="col-md-4">
                    <b>Aadhar Number:</b>&nbsp;{{$userData->aadhar_number}}
                </div>
                <br>
                <div class="col-md-4">
                    <b>Mobile Number:</b>&nbsp;{{$userData->birth_date}}
                </div>
                <div class="col-md-4">
                    <b>Age:</b>&nbsp;{{$userData->age}}
                </div>
                <div class="col-md-4">
                    <b>Gengder:</b>&nbsp;{{$userData->gender}}
                </div>
                <br>
                <div class="col-md-4">
                    <b>Category:</b>&nbsp;{{$category->category}}
                </div>
                <div class="col-md-4">
                    <b>Marital Status:</b>&nbsp;{{$userData->martial_status}}
                </div>
                <div class="col-md-4">
                    <b>Country:</b>&nbsp;India
                </div>
                <br>
                <div class="col-md-4">
                    <b>State:</b>&nbsp;Rajasthan
                </div>
                <div class="col-md-4">
                    <b>Correspondence Address:</b>&nbsp;{{$userData->correspondence_address}}
                </div>
                <div class="col-md-4">
                    <b>Parmanent Address:</b>&nbsp;{{$userData->parmanent_address}}
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <b> Applicant Qualification
                    </b>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"><b>Exam Name</b></div>
                <div class="col-md-3"><b>Subject Name</b></div>
                <div class="col-md-3"><b>Board/University</b></div>
                <div class="col-md-2"><b>Passing Year</b></div>
                <div class="col-md-2"><b>Percentage</b></div>
            </div>
            @foreach($applicant_qualification as $data)
            @if(isset($data))
            <div class="row">
                <div class="col-md-2">
                    {{$data->exam_name}}
                </div>
                <div class="col-md-3">
                    {{$data->subject_name}}
                </div>
                <div class="col-md-3">
                    {{$data->bord_university}}
                </div>
                <div class="col-md-2">
                    {{$data->passing_year}}
                </div>
                <div class="col-md-2">
                    {{$data->percentage}}
                </div>
            </div>
            <br>
            @endif
            @endforeach
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <b> Applicant Other Qualification
                    </b>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"><b>Course Name</b></div>
                <div class="col-md-4"><b>Name of Institute</b></div>
                <div class="col-md-4"><b>Passing Year</b></div>
            </div>
            @foreach($applicant_itknowledge as $data)
            @if(isset($data))
            <div class="row">
                <div class="col-md-4">
                    {{$data->exam_name}}
                </div>
                <div class="col-md-4">
                    {{$data->board_name}}
                </div>
                <div class="col-md-4">
                    {{$data->passing_year}}
                </div>
            </div>
            @endif
            @endforeach
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <b> Applicant Experience
                    </b>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-4"><b>Job Name</b></div>
                <div class="col-md-4"><b>Organisastion Name</b></div>
                <div class="col-md-4"><b>Total Experience</b></div>
            </div>
            @foreach($applicant_experience as $data)
            @if(isset($data))
            <div class="row">
                <div class="col-md-4">
                    {{$data->post_name}}
                </div>
                <div class="col-md-4">
                    {{$data->organisastion_name}}
                </div>
                <div class="col-md-4">
                    {{$data->total_exp}} Months
                </div>
            </div>
            @endif
            @endforeach
            <br><br>
            <div class="row">
                <div class="col-md-12">
                    <b> Applicant Selected Districts
                    </b>
                </div>
                <br>
                @foreach($districts as $data)
                <div class="col-md-3">
                    {{$data->name}}
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="card-footer">
        <a class="btn btn-success" href="javascript:void(0);" onclick="printPageArea('printableArea')">Print</a>
    </div>
</div>

<script>
    function printPageArea(areaID) {
        var printContent = document.getElementById(areaID).innerHTML;
        var originalContent = document.body.innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
</script>


<style>
    .card {
        margin-top: 90px !important;
    }

    .btn.btn-success {
        float: right;
        margin-bottom: 30px;
    }
</style>
@endsection('HomeContent')