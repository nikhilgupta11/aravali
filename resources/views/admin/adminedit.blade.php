@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
   
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
    
   
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card">
    <div class="card-header">Change Profile Details
    <a class="btn btn-primary btn-sm float-end" href="{{ asset('admin/states') }}" enctype="multipart/form-data"> Back</a>
    </div>
    <div class="card-body">
    
    <form action="{{ route('admin.adminUpdateAccount') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <label for="name" class="form-label">Name</label>
    <input name="name" type="text" class="form-control" value="{{$name}}" placeholder="name">
    @error('name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <label for="old_password" class="form-label">Old Password</label>
    <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
    placeholder="Old Password">
    @error('old_password')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <label for="newPasswordInput" class="form-label">New Password</label>
    <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
    placeholder="New Password">
    @error('new_password')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
    <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
    placeholder="Confirm New Password">
    </div>
    </div>
    <div class="col-xs-8 col-sm-8 col-md-8">
    <div class="form-group">
    <label for="newProfilePicInput" class="form-label">Profile Pic</label>
    <input name="new_profilepic" type="file" class="form-control @error('new_profilepic') is-invalid @enderror" id="newProfilepicInput"
    placeholder="New Profile Pic">
    @error('new_profilepic')
    <span class="text-danger">{{ $message }}</span>
    @enderror
    </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4 mt-4">
        <div class="form-group">
    <img src="{{ asset('images/users/' . $profile_pic) }}" alt="img" width="50px" height="50px">
    </div>
</div>
    <button class="btn btn-success">Submit</button>
    </div>
    
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
@section('footer-scripts')

@endsection