@extends('Front/Layouts/Layout/HomeLayout')
@section('HomeContent')
<div class="container customForm">
    <div class="heading">
        <h2>{{ ucfirst($job[0]->job_title) }}</h2>
    </div>
    <form action="{{ route('FormSubmit', ['id' => $job[0]->id]) }}" method="POST" enctype="multipart/form-data" id="formPrevent">
        @csrf
        <input type="text" name="unique" value="2" hidden>
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <label for="district">Apply For District:<span class="required">*</span></label>
                <div class="form-group">
                    <select class="form-control @error('district[]') is-invalid @enderror" name="district[]" id="district_id" multiple require>
                        @foreach ($job_district as $data)
                        <option value="{{ $data->district_id }}">{{ $data->district_name }}</option>
                        @endforeach
                    </select>
                    @error('district[]')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="name">Name:<span class="required">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" name="name" require>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="father_name">Father's Name:<span class="required">*</span></label>
                    <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" placeholder="Enter Father's Name" name="father_name" require />
                    @error('father_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="mother_name">Mother's Name:<span class="required">*</span></label>
                    <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" placeholder="Enter Mother's Name" name="mother_name" require />
                    @error('mother_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="email">Email:<span class="required">*</span></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" require>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="contact_number">Contact Number:<span class="required">*</span></label>
                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror" id="contact_number" placeholder="Enter Contact Number" name="contact_number" require>
                    @error('contact_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="dob">Date of Birth:<span class="required">*</span></label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" placeholder="Enter Your DOB" name="dob" require>
                    @error('dob')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="age">Candidate Age on 1 Jan. 2023:<span class="required">*</span></label>
                    <input type="text" class="form-control @error('dob') is-invalid @enderror" id="age" name="age" readonly require>
                </div>
                @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4 col-sm-4">
                <label for="gender">Gender:<span class="required">*</span></label>
                <div class="form-group">
                    <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender" require>
                        <option selected value="">--Select Your Gender--</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <label for="category">Category:<span class="required">*</span></label>
                <div class="form-group">
                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="category" require>
                        <option selected value="">--Select Your Category--</option>
                        @foreach ($category as $data)
                        <option value="{{ $data->id }}">{{ $data->category }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <label for="marital_status">Marital Status:<span class="required">*</span></label>
                <div class="form-group">
                    <select class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" id="marital_status" require>
                        <option selected value="">--Marital Status--</option>
                        <option value="married">Married</option>
                        <option value="un-married">Un-Married</option>
                        <option value="other">Other</option>
                    </select>
                    @error('marital_status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="aadhar_number">Aadhar Number:<span class="required">*</span></label>
                    <input type="text" class="form-control @error('aadhar_number') is-invalid @enderror" id="aadhar_number" placeholder="Enter Aadhar Number" name="aadhar_number" require>
                    @error('aadhar_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="correspondence_address">Correspondence Address:<span class="required">*</span></label>
                    <textarea class="form-control @error('correspondence_address') is-invalid @enderror" name="correspondence_address" id="correspondence_address" cols="40" rows="4" placeholder="Enter your Address" require></textarea>
                    <!-- <input type="text" class="form-control @error('correspondence_address') is-invalid @enderror" id="correspondence_address" placeholder="Enter your Address" name="correspondence_address" require> -->
                    @error('correspondence_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="parmanent_address">Parmanent Address:<span class="required">*</span></label>
                    <textarea class="form-control @error('parmanent_address') is-invalid @enderror" name="parmanent_address" id="parmanent_address" cols="40" rows="4" placeholder="Enter your Parmanent Address" require></textarea>
                    <!-- <input type="text" class="form-control @error('parmanent_address') is-invalid @enderror" id="parmanent_address" placeholder="Enter your Parmanent Address" name="parmanent_address" require> -->
                    @error('parmanent_address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="checkbox" name="parmanent" id="parmanent_check" />
                <span><b>&nbsp;Same as Correspondence Address </b> </span>
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <!-- <label for="country">Country:<span class="required">*</span></label> -->
            <div class="form-group">
                <select class="form-control @error('country') is-invalid @enderror" name="country" id="country_id" require onchange="change_state()" hidden>
                    <option value="">--Select Your Country--</option>
                    @foreach ($country as $data)
                    @if ($data->country_name == 'india' || $data->country_name == 'India')
                    <option selected value="{{ $data->id }}">{{ $data->country_name }}</option>
                    @else
                    <option value="{{ $data->id }}">{{ $data->country_name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('country')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="col-md-4 col-sm-4">
            <!-- <label for="state">State:<span class="required">*</span></label> -->
            <div class="form-group">
                <select class="form-control @error('state') is-invalid @enderror" name="state" id="state_id" onchange="change_district()" require hidden>
                    @foreach ($state as $data)
                    @if ($data->name == 'Rajasthan' || $data->name == 'rajasthan')
                    <option selected value="{{ $data->id }}">{{ $data->name }}</option>
                    @else
                    <option value="{{ $data->id }}">{{ $data->name }}</option>
                    @endif
                    @endforeach
                </select>
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="contentLeft">
                    <p><b> Educational Qualification </b></p>
                </div>
                <div class="addbutton">
                    <a href="#clonetr2">
                        <input type="button" class="addButton" value="add" /></a>
                </div>
            </div>
        </div>
        <div id="table11">
            @foreach ($eligibility as $data)
            <div class="row">
                <div class="col-md-12">
                    <input type=" text" name="exam_name[]" class="@error('exam_name') is-invalid @enderror" value="{{ $data->title }}" require hidden />
                    <label for=""><b>Name of Exam : </b></label> <b>{{ $data->title }}</b>
                </div>
                <div class="col-md-4">
                    <label for="subject_name"><b>Subject</b></label><br>
                    <input type="text" name="subject_name[]" class="form-control vvvvv @error('subject_name') is-invalid @enderror" require />
                    @error('subject_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="board_name"><b>Name of Exam Board / University</b></label>
                    <input type="text" name="board_name[]" class="form-control vvvvv @error('board_name') is-invalid @enderror" require />
                    @error('board_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="roll_no"><b>Roll No.</b></label><br>
                    <input type="text" name="roll_no[]" class="form-control vvvvv @error('roll_no') is-invalid @enderror" require />
                    @error('roll_no')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="reasult"><b>Exam Result</b></label>
                    <input type="text" name="reasult[]" class="form-control vvvvv @error('reasult') is-invalid @enderror" require />
                    @error('reasult')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="passing_year"><b>Year of Passing</b></label>
                    <input type="number" name="passing_year[]" class="form-control vvvvv @error('passing_year') is-invalid @enderror" require />
                    @error('passing_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="percentage"><b>Percentage</b></label>
                    <input type="number" name="percentage[]" class="form-control vvvvv @error('percentage') is-invalid @enderror" require />
                    @error('percentage')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="marksheet"><b>Upload Document</b></label>
                    <input type="file" name="marksheet[]" class="form-control vvvvv @error('marksheet') is-invalid @enderror" require />
                    @error('marksheet')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <hr class="solid">
            @endforeach
        </div>
        <div id="cloning-table2">
            <div class="clonetr2" id="clonetr2">
                <div class="row">
                    <div class="col-md-4">
                        <label for=""><b>Name of Exam : </b></label>
                        <input type=" text" name="exam_name[]" class="form-control vvvvv @error('exam_name') is-invalid @enderror" require />
                    </div>

                    <div class="col-md-4">
                        <label for="subject_name"><b>Subject</b></label><br>
                        <input type="text" name="subject_name[]" class="form-control vvvvv @error('subject_name') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="board_name"><b>Name of Exam Board / University</b></label>
                        <input type="text" name="board_name[]" class="form-control vvvvv @error('board_name') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="roll_no"><b>Roll No.</b></label><br>
                        <input type="text" name="roll_no[]" class="form-control vvvvv @error('roll_no') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="reasult"><b>Exam Result</b></label>
                        <input type="text" name="reasult[]" class="form-control vvvvv @error('reasult') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="passing_year"><b>Year of Passing</b></label>
                        <input type="number" name="passing_year[]" class="form-control vvvvv @error('passing_year') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="percentage"><b>Percentage</b></label>
                        <input type="number" name="percentage[]" class="form-control vvvvv @error('percentage') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="marksheet"><b>Upload Document</b></label>
                        <input type="file" name="marksheet[]" class="form-control vvvvv @error('marksheet') is-invalid @enderror" require />
                    </div>
                </div>
                <input type="button" class="deleteButton" value="delete" />
                <br>
                <br>
                <hr class="solid">
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contentLeft">
                    <p><b> Other Qualification </b></p>
                </div>
                <div class="addbutton">
                    <a href="#clonetr3">
                        <input type="button" class="addButton1" value="add" />
                    </a>
                </div>
            </div>
        </div>
        <div id="table22">
            @foreach ($eligibility1 as $data1)
            <div class="row">
                <div class="col-md-4">
                    <input type=" text" name="exam_name1[]" class="@error('exam_name') is-invalid @enderror" value="{{ $data1->title }}" require hidden />
                    <label for=""><b>Course Name: </b></label> <b>{{ $data1->title }}</b>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="board_name"><b>Name of Institute</b></label>
                    <input type="text" name="board_name1[]" class="form-control vvvvv @error('board_name') is-invalid @enderror" require />
                    @error('board_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="passing_year"><b>Year of Passing</b></label>
                    <input type="number" name="passing_year1[]" class="form-control vvvvv @error('passing_year') is-invalid @enderror" require />
                    @error('passing_year')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="marksheet"><b>Upload Document</b></label>
                    <input type="file" name="marksheet1[]" class="form-control vvvvv @error('marksheet') is-invalid @enderror" require />
                    @error('marksheet')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <br>
            <hr class="solid">
            @endforeach
        </div>
        <div id="cloning-table1">
            <div class="clonetr1" id="clonetr3">

                <div class="row">
                    <div class="col-md-4">
                        <label for=""><b>Course Name : </b></label>
                        <input type=" text" name="exam_name1[]" class="form-control vvvvv @error('exam_name') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="board_name1"><b>Name of Institute</b></label>
                        <input type="text" name="board_name1[]" class="form-control vvvvv @error('board_name') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="passing_year1"><b>Year of Passing</b></label>
                        <input type="number" name="passing_year1[]" class="form-control vvvvv @error('passing_year') is-invalid @enderror" require />
                    </div>
                    <div class="col-md-4">
                        <label for="marksheet"><b>Upload Document</b></label>
                        <input type="file" name="marksheet1[]" class="form-control vvvvv @error('marksheet') is-invalid @enderror" require />
                    </div>
                    <br>
                </div>
                <input type="button" class="deleteButton1" value="delete" />
                <br>
                <hr class="solid">
            </div>
            <br>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contentLeft">
                    <p><b> Experience </b></p>
                </div>
                <div class="addbutton">
                    <a href="#clonetr4">
                        <input type="button" class="addButton2" value="add" />
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label for="job_nature"><b>Nature of Job</b></label>
                <input type=" text" name="job_nature[]" class="form-control vvvvv @error('job_nature') is-invalid @enderror" require />
                @error('job_nature')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="orgnisastion_name"><b>Orgnisastion Name</b></label>
                <input type="text" name="orgnisastion_name[]" class="form-control vvvvv @error('orgnisastion_name') is-invalid @enderror" require />
                @error('orgnisastion_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="post_name"><b>Post Name</b></label>
                <input type="text" name="post_name[]" class="form-control vvvvv @error('post_name') is-invalid @enderror" require />
                @error('post_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="from"> <b>Start Date</b></label><br>
                <input type="date" name="from[]" class="form-control vvvvv @error('from') is-invalid @enderror" id="startdate" require />
                @error('from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="to"> <b>End Date</b></label><br>
                <input type="date" name="to[]" class="form-control vvvvv @error('from') is-invalid @enderror" id="enddate" require />
                @error('from')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="total_experience"><b>Total Experiance (In Months)</b></label>
                <input type="text" name="total_experience[]" class="form-control vvvvv @error('total_experience') is-invalid @enderror" readonly require id="experaince" />
                @error('total_experience')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div id="cloning-table" class="noneDisplay">
            <div class="clonetr" id="clonetr4">
                <hr class="solid">
                <div class="row">
                    <div class="col-md-4">
                        <label for="job_nature"><b>Nature of Job</b></label>
                        <input type=" text" name="job_nature[]" class="form-control vvvvv @error('job_nature') is-invalid @enderror" require />
                        @error('job_nature')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="orgnisastion_name"><b>Orgnisastion Name</b></label>
                        <input type="text" name="orgnisastion_name[]" class="form-control vvvvv @error('orgnisastion_name') is-invalid @enderror" require />
                        @error('orgnisastion_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="post_name"><b>Post Name</b></label>
                        <input type="text" name="post_name[]" class="form-control vvvvv @error('post_name') is-invalid @enderror" require />
                        @error('post_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="from"> <b>Start Date</b></label><br>
                        <input type="date" name="from[]" class="form-control vvvvv @error('from') is-invalid @enderror" id="startdate" require />
                        @error('from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="to"> <b>End Date</b></label><br>
                        <input type="date" name="to[]" class="form-control vvvvv @error('from') is-invalid @enderror" id="enddate" require />
                        @error('from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="total_experience"><b>Total Experiance (In Months)</b></label>
                        <input type="text" name="total_experience[]" class="form-control vvvvv @error('total_experience') is-invalid @enderror" readonly require id="experaince" />
                        @error('total_experience')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <input type="button" class="deleteButton2" value="delete" />
                <br>
                <br>
            </div>
            <br>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-4">
                <label for="signature">Upload Signature<span class="required">*</span></label>
                <input type="file" name="signature" id="signature" class="form-control @error('signature') is-invalid @enderror" require>
                @error('signature')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-md-4">
                <label for="image">Upload Passport Photo<span class="required">*</span></label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" require>
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <label for=""><b>Declaration </b></label>
            </div>
            <div class="col-md-12 displayDeclaration">
                <div>
                    <input type="checkbox" name="declaration" id="declaration" class="@error('declaration') is-invalid @enderror" require />
                </div>
                <div class="col-md-11">
                    Declaration Content - I hereby declare that I fulfill the eligibility conditions as per the
                    advertisement and that all the statements made in this application are true, complete and correct to
                    the best of my knowledge and belief. I understand that in the event of any information being found
                    false or incorrect at any stage or not satisfying the eligibility conditions according to the
                    required mentioned in the guidelines, my candidature/internship is liable to be
                    cancelled/terminated.

                </div>
                @error('declaration')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <br><br>
        <div class="contentRight">
            <button type="submit" class="btn btn-primary submit" id="submit" name="Submit" value="2">Submit</button>
        </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- For country state district dropdown -->
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

    function change_state() {
        let ct = document.getElementById('country_id');
        let st = document.getElementById("state_id")
        if (ct.value) {
            st.disabled = false
        } else {
            st.disabled = true
        }
    }

    function change_district() {
        let ct = document.getElementById('state_id');
        let st = document.getElementById("district_id")
        if (ct.value) {
            st.disabled = false
        } else {
            st.disabled = true
        }
    }
</script>

<!-- For Validations -->
<script>
    $(document).ready(function() {
        $("#formPrevent").validate({
            rules: {
                'district[]': {
                    required: true
                },
                name: {
                    required: true,
                    minlength: 2,
                },
                father_name: {
                    required: true,
                    minlength: 2,
                },
                mother_name: {
                    required: true,
                    minlength: 2,
                },
                email: {
                    required: true,
                    email: true,
                },
                contact_number: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                dob: {
                    required: true,
                    date: true
                },
                gender: {
                    required: true,
                },
                category: {
                    required: true,
                },
                marital_status: {
                    required: true
                },
                aadhar_number: {
                    required: true,
                    digits: true,
                    minlength: 12,
                    maxlength: 12
                },
                correspondence_address: {
                    required: true
                },
                parmanent_address: {
                    required: true
                },

                // 'exam_name[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                // 'subject_name[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                // 'board_name[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                // 'roll_no[]': {
                //     minlength: 2,
                // },
                // 'reasult[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                'passing_year[]': {
                    digits: true,
                    minlength: 4,
                    maxlength: 4
                },
                'percentage[]': {
                    // digits: true,
                    number: true
                },
                // 'exam_name1[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                // 'board_name1[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                'passing_year1[]': {
                    digits: true,
                    minlength: 4,
                    maxlength: 4
                },

                // 'job_nature[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                // 'orgnisastion_name[]': {
                //     digits:false,
                //     minlength: 2,
                // },
                // 'post_name[]': {
                //     digits:false,
                //     minlength: 2,
                // },

                // total_experience: {
                //     digits: true
                // },
                // from: {
                //     required: true,
                //     date: true
                // },
                // to: {
                //     required: true,
                //     date: true
                // },
                // age: {
                //     required: true,
                //     digits: true,
                //     maxlength: 3
                // }
                // state: {
                //     required: true
                // },
                // country: {
                //     required: true
                // },
                signature: {
                    required: true,
                    // file: true
                },
                image: {
                    required: true,
                    // file: true
                },
                declaration: {
                    required: true,
                    // minlength: 1,
                    // checked: true
                },
            },
            messages: {
                email: {
                    required: "Please enter a valid email address",
                    email: "email must contain @ and . ",
                },
            },
            // submitHandler: function(form) {
            //     form.submit();
            // }
        });
    });
</script>

<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NSLHKCP');
</script>

<!-- for dynamic row add dob and parmanent address -->
<script>
    $(document).ready(function() {
        var Data_to_clone = $('#cloning-table2').html();
        var clicks = 0;
        $(".addButton").click(function() {
            clicks += 1;
            if (clicks == 1) {
                // console.log("hello from if");
                $('.clonetr2').css('display', 'block');
            } else {
                // console.log("hello from else");
                $('#cloning-table2').append(Data_to_clone);
                $('.clonetr2').css('display', 'block');
            }
        });

        $("#cloning-table2").on('click', '.deleteButton', function() {
            $(this).parents(".clonetr2").remove();
        });
    });

    $(document).ready(function() {
        var Data_to_clone = $('#cloning-table1').html();
        var clicks = 0;

        $(".addButton1").click(function() {
            clicks += 1;
            if (clicks == 1) {
                // console.log("hello from if");
                $('.clonetr1').css('display', 'block');
            } else {
                // console.log("hello from else");
                $('#cloning-table1').append(Data_to_clone);
                $('.clonetr1').css('display', 'block');
            }
        });
        // $(".addButton1").click(function() {
        //     $('#cloning-table1').append(Data_to_clone);
        // });

        $("#cloning-table1").on('click', '.deleteButton1', function() {
            $(this).parents(".clonetr1").remove();
        });
    });

    $(document).ready(function() {
        var Data_to_clone = $('#cloning-table').html();
        var clicks = 0;

        $(".addButton2").click(function() {
            clicks += 1;
            if (clicks == 1) {
                // console.log("hello from if");
                $('.clonetr').css('display', 'block');
            } else {
                // console.log("hello from else");
                $('#cloning-table').append(Data_to_clone);
                $('.clonetr').css('display', 'block');
            }
        });
        // $(".addButton2").click(function() {
        //     $("#cloning-table").append(Data_to_clone);
        // });

        $("#cloning-table").on('click', '.deleteButton2', function() {
            $(this).parents(".clonetr").remove();
        });
    });

    $("#dob").change(function() {

        var dob = $('#dob').val();
        var today = "2023-01-01";

        const date1 = new Date(dob);
        const date2 = new Date(today);
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        var age = 0;
        // console.log(diffDays);
        if (diffDays >= 365) {
            age = Math.floor(diffDays / 365);
            // console.log(age);
        } else {
            age = '0';
        }

        $('#age').val(age);
    });

    $("#parmanent_check").change(function() {
        var corres_add = $('#correspondence_address').val();
        var checkbox = $("#parmanent_check")

        if (checkbox[0].checked) {
            $('#parmanent_address').val(corres_add);
        } else {
            $('#parmanent_address').val('');
        }
    })

    $('[name="from[]"]').change(function() {

        var start_date = $('#startdate').val();
        var end_date = $('#enddate').val();

        var date1 = new Date(start_date);
        var date2 = new Date(end_date);
        var months = date2.getMonth() -
            date1.getMonth() +
            12 * (date2.getFullYear() - date1.getFullYear())

        // console.log(months, "startdate")


        $('[name="total_experience[]"]').val(months);
    });
    $('[name="to[]"]').change(function() {

        var start_date = $('#startdate').val();
        var end_date = $('#enddate').val();
        // console.log(start_date, end_date, "enddate1")


        const date1 = new Date(start_date);
        const date2 = new Date(end_date);
        // console.log(date1, date2, "enddate2")

        var months = date2.getMonth() -
            date1.getMonth() +
            12 * (date2.getFullYear() - date1.getFullYear())

        // console.log(months, "enddate")

        $('[name="total_experience[]"]').val(months);
    });
</script>

<!-- checkbox style -->
<script>
    document.multiselect('#district_id')
        .setCheckBoxClick("checkboxAll", function(target, args) {
            console.log("Checkbox 'Select All' was clicked and got value ", args.checked);
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

<!-- custom  style -->
<style>
    button#submit {
        width: 300px;
    }

    .customForm {
        margin-top: 100px;
        margin-bottom: 100px;
    }

    .heading {
        text-align: center;
        /* padding-top: 20px; */
        margin-bottom: 30px;
    }

    .contentLeft {
        text-align: left;
        background: lightgoldenrodyellow;
        width: 100%;
        height: 50px;
    }

    .contentRight {
        text-align: right;
    }

    button,
    input,
    optgroup,
    select,
    textarea {
        border: none;
    }


    .tableBorder td {
        border: solid 1px black;

    }

    .addbutton {
        float: right;
        /* margin-right: 50px */
    }

    .addButton,
    .addButton2,
    .addButton1 {
        border-radius: 5px;
        background-color: green;
        color: #fff;
        width: auto;
        padding: 5px 10px;
    }

    .deleteButton,
    .deleteButton1,
    .deleteButton2 {
        border-radius: 5px;
        background-color: #dc3545;
        padding: 5px 2px;
        margin-top: 2px;
    }

    td.tableButtons {
        border: none !important;
    }

    .required {
        color: red;
    }

    .displayDeclaration {
        display: flex;
    }

    label {
        display: inline-block;
        margin-bottom: 0.5rem;
        font-weight: bolder;
    }


    td.ffffcol {
        width: 240px;
    }

    td.tableButtons1 {
        border: none;
    }

    #district_id_multiSelect {
        width: 200px;
    }

    input#district_id_input {
        border: solid 1px;
        border-radius: 5px;
        width: 340px;
        height: 40px;
    }

    div#district_id_itemList {
        width: 340px;
        border-radius: 5px;
        border: solid 1px black;
    }


    .multiselect-wrapper {
        width: 180px;
        display: inline-block;
        white-space: nowrap;
        font-size: 12px;
        font-family: "Segoe UI", Verdana, Helvetica, Sans-Serif;
    }

    .multiselect-wrapper .multiselect-input {
        width: 100%;
        padding-right: 50px;
    }

    .multiselect-wrapper label {
        display: block;
        font-size: 12px;
        font-weight: 600;
    }

    .multiselect-wrapper .multiselect-list {
        z-index: 1;
        position: absolute;
        display: none;
        background-color: white;
        border: 1px solid grey;
        border-bottom-left-radius: 2px;
        border-bottom-right-radius: 2px;
        margin-top: -2px;
    }

    .multiselect-wrapper .multiselect-list.active {
        display: block;
    }

    .multiselect-wrapper .multiselect-list>span {
        font-weight: bold;
    }

    .multiselect-wrapper .multiselect-list .multiselect-checkbox {
        margin-right: 2px;
    }

    .multiselect-wrapper .multiselect-list>span,
    .multiselect-wrapper .multiselect-list li {
        cursor: default;
    }

    .multiselect-wrapper .multiselect-list {
        padding: 5px;
        min-width: 200px;
    }

    .multiselect-wrapper ul {
        list-style: none;
        display: block;
        position: relative;
        padding: 0px;
        margin: 0px;
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
    }

    .multiselect-wrapper ul li {
        padding-right: 20px;
        display: block;
    }

    .multiselect-wrapper ul li.active {
        background-color: rgb(0, 102, 255);
        color: white;
    }

    .multiselect-wrapper ul li:hover {
        background-color: rgb(0, 102, 255);
        color: white;
    }

    .multiselect-input-div {
        height: 34px;
    }

    .multiselect-input-div input {
        border: 1px solid #ababab;
        background: #fff;
        margin: 5px 0 6px 0;
        padding: 5px;
        vertical-align: middle;
    }

    .multiselect-count {
        position: relative;
        text-align: center;
        border-radius: 2px;
        background-color: lightblue;
        display: inline-block !important;
        padding: 2px 7px;
        left: -45px;
    }

    .multiselect-wrapper.disabled .multiselect-dropdown-arrow {
        border-top: 5px solid lightgray;
    }

    .multiselect-wrapper.disabled .multiselect-count {
        background-color: lightgray;
    }

    .multiselect-dropdown-arrow {
        width: 0;
        height: 0;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid black;
        position: absolute;
        line-height: 20px;
        text-align: center;
        display: inline-block !important;
        margin-top: 17px;
        margin-left: -42px;
    }


    .deleteButton,
    .deleteButton1,
    .deleteButton2 {
        /* border-radius: 10px; */
        background-color: #dc3545;
        float: right;
        margin-left: 995px;
    }

    .clonetr2 {
        display: none;
    }

    .clonetr {
        display: none;
    }

    .clonetr1 {
        display: none;
    }

    p {
        padding: 14px;
    }

    hr.solid {
        border-top: 3px solid #bbb;
    }
</style>
@endsection('HomeContent');