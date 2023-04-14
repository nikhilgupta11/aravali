@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header"><b>Applicant's Detail</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <b> Job Name</b><br>
                            {{ $job->job_title }}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <b>Contact Number</b><br>
                            {{ $user->mobile_no }}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <b>Applicant DOB</b><br>
                            {{ $user->birth_date }}
                        </div>

                    </div>

                    <div class="row mt-3">

                        <div class="col-md-4 col-sm-4">
                            <b>Age</b><br>
                            {{ $user->age }}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <b>Country</b><br>
                            {{ getNationalityName($user->nationality) }}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <b>State</b><br>
                            {{ getStateName($user->state) }}
                        </div>


                    </div>
                    <div class="row mt-3">

                        <div class="col-md-4 col-sm-4">
                            <b>District</b><br>
                            <?php $i = 1;
                            $applicant_district_count = count($applicant_district);

                            ?>
                            @foreach ($applicant_district as $data)
                            {{ getAppplicantDistrict($data->district_id) }}
                            @if($i < $applicant_district_count) <?php echo ',' ?> @endif <?php $i++; ?> @endforeach </div>
                                <div class="col-md-4 col-sm-4">
                                    <b>Marital Status</b><br>
                                    {{ $user->martial_status }}
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <b>Aadhar Number</b><br>
                                    {{ $user->aadhar_number }}
                                </div>

                        </div>
                        <div class="row mt-3">

                            <div class="col-md-4 col-sm-4">
                                <b>Correspondence Address</b><br>
                                {{ $user->correspondence_address }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <b>Parmanent Address</b><br>
                                {{ $user->parmanent_address }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <b>Category</b><br>
                                {{ getCategoryName($user->category) }}
                            </div>

                        </div>
                        <div class="row mt-3">

                            <div class="col-md-4 col-sm-4">
                                <b>Applicant Name</b><br>
                                {{ $user->name }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <b>Gender</b><br>
                                {{ $user->gender }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <b>Mother's Name</b><br>
                                {{ $user->mother_name }}
                            </div>

                        </div>
                        <div class="row mt-3">


                            <div class="col-md-4 col-sm-4">
                                <b>Email</b><br>
                                {{ $user->email }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <b>Department Name</b><br>
                                {{ getDepartmentNameForApplicant($user->job_id) }}
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <b>Father's Name</b><br>
                                {{ $user->father_name }}
                            </div>
                        </div>
                        <div class="row mt-3">

                            <div class="col-md-4 col-sm-4">
                                <b>Image</b><br>
                                @if ($user->image)
                                <img src="{{ asset('assets/images/' . $user->image) }}" alt="img" width="150" height="150"><br>
                                @else
                                <p>N/A</p>
                                @endif
                                @if ($user->image)
                                <a href="{{ asset('assets/images/' . $user->image) }}" width="50" height="50" target="_blank" download>Download</a>
                                @endif
                            </div>



                            <div class="col-md-4 col-sm-4">
                                <b>Signature</b><br>
                                @if ($user->sinature)
                                <img src="{{ asset('assets/images/' . $user->sinature) }}" alt="img" width="150" height="150"><br>
                                @else
                                <p>N/A</p>
                                @endif
                                @if ($user->sinature)
                                <a href="{{ asset('assets/images/' . $user->sinature) }}" target="_blank" download>Download</a>
                                @endif
                            </div>
                        </div>




                        <table class="table ">
                            <thead>

                                <div class="card-header mt-5"><b>Experience</b>
                                </div>
                                <tr>
                                    <th scope="col">Job Type</th>
                                    <th scope="col">Orgnisastion Name</th>
                                    <th scope="col">Post Name</th>
                                    <th scope="col">Job Start Date</th>
                                    <th scope="col">Job End Date</th>
                                    <th scope="col">Total Experiences</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experience as $data)
                                <tr>

                                    <td> {{ isset($data->job_nature) ? $data->job_nature : 'N/A' }}
                                    </td>
                                    <td> {{ isset($data->organisastion_name) ? $data->organisastion_name : 'N/A' }}
                                    </td>
                                    <td> {{ isset($data->post_name) ? $data->post_name : 'N/A' }}
                                    </td>
                                    <td> {{ isset($data->start_date) ? $data->start_date : 'N/A' }}
                                    </td>
                                    <td> {{ isset($data->end_date) ? $data->end_date : 'N/A' }}
                                    </td>
                                    <td> {{ isset($data->total_exp) ? $data->total_exp . ' Months' : 'N/A' }}
                                    </td>


                                </tr>
                                @endforeach

                            </tbody>
                        </table>



                        <table class="table mt-3">
                            <thead>

                                <div class="card-header mt-5"><b>Qualification</b>
                                </div>
                                <tr>
                                    <th scope="col">Exam Name</th>
                                    <th scope="col">Subject Name</th>
                                    <th scope="col">Bord/University Name</th>
                                    <th scope="col">Roll Number</th>
                                    <th scope="col">Result</th>
                                    <th scope="col">Passing Year</th>
                                    <th scope="col">Percentage</th>
                                    <th scope="col">Marksheet</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($qualification as $data)
                                <tr>

                                    <td> {{ isset($data->exam_name) ? $data->exam_name : '' }}
                                    </td>
                                    <td> {{ isset($data->subject_name) ? $data->subject_name : '' }}
                                    </td>
                                    <td> {{ isset($data->bord_university) ? $data->bord_university : '' }}
                                    </td>
                                    <td> {{ isset($data->roll_no) ? $data->roll_no : '' }}
                                    </td>
                                    <td> {{ isset($data->result) ? $data->result : '' }}
                                    </td>
                                    <td> {{ isset($data->passing_year) ? $data->passing_year : '' }}
                                    </td>
                                    <td> {{ isset($data->percentage) ? $data->percentage : '' }}
                                    </td>
                                    <td>
                                        @if ($data->marksheet)
                                        <img src="{{ asset('assets/images/' . $data->marksheet) }}" alt="img" width="50" height="50">
                                        @else
                                        <p><?php echo ''; ?></p>
                                        @endif
                                        @if ($data->marksheet)
                                        <a href="{{ asset('assets/images/' . $data->marksheet) }}" target="_blank" width="50" height="50" download>Download</a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>






                        <table class="table mt-3">
                            <thead>

                                <div class="card-header mt-5"><b> Other Qualification</b>
                                </div>
                                <tr>
                                    <th scope="col">Course Name</th>
                                    <th scope="col">Institute Name</th>

                                    <th scope="col">Passing Year</th>
                                    <th scope="col">Marksheet</th>


                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicant_other_qualification as $data)
                                <tr>
                                    <td> {{ isset($data->exam_name) ? $data->exam_name : 'N/A' }}
                                    </td>
                                    <td> {{ isset($data->board_name) ? $data->board_name : 'N/A' }}
                                    </td>

                                    <td> {{ isset($data->passing_year) ? $data->passing_year : 'N/A' }}
                                    </td>

                                    <td>
                                        @if ($data->marksheet)
                                        <img src="{{ asset('assets/images/' . $data->marksheet) }}" alt="img" width="50" height="50">
                                        @else
                                        <p><?php echo ''; ?></p>
                                        @endif
                                        @if ($data->marksheet)
                                        <a href="{{ asset('assets/images/' . $data->marksheet) }}" target="_blank" width="50" height="50" download>Download</a>
                                        @endif
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-header b {
            color: white;
        }

        .card-header {
            background-color: gray;

        }
    </style>
    @endsection