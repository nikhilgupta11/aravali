@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">State Details
                    <a href="{{ route('admin.states.index') }}" class="btn btn-primary btn-sm float-end">View All</a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form"><b>Car Type</b></label>
                        <div class="col-sm-10">

                            {{ $state->name }}

                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-label-form"><b>Country Name</b></label>
                        <div class="col-sm-10">

                            {{ $country->country_name }}

                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Car Model</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->car_model_name }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Air Conditioner</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->air_conditioner }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Seat</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->seats }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Extra Fare</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->extra_fare }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Fare</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->fare}}
                        </div>
                    </div>
                    <div class="row mb-4">

                        <label class="col-sm-2 col-label-form"><b>Minimum Fare</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->min_fare }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Fuel Type</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->fuel_type }}
                        </div>
                    </div>

                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Cancellation</b></label>

                        <div class="col-sm-10">
                            {{ $carmodel->cancellation }}
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-sm-2 col-label-form"><b>Status</b></label>
                        <div class="col-sm-10">
                            {{ $carmodel->status=='0' ? 'Active':'Inactive' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection