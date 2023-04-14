@extends('layout.admin.layout')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Job Applications</h4>
                    <a class="btn btn-warning float-end" href="{{ route('admin.applicant.export') }}">Export Job
                        Applicants</a>

                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="container customStyle">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label><strong>Country Name :</strong></label>
                                <select disabled id='country' class="form-control" style="width: 200px">
                                    <option value="{{ $selected_country->id }}">{{ ucfirst($selected_country->country_name)}}
                                    </option>
                                    @foreach ($country as $country1)
                                    <option value="{{ $country1->id }}">{{ $country1->country_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><strong>State Name :</strong></label>
                                <select id='state' class="form-control" disabled style="width: 200px">
                                    <option value="{{ $selected_state->id }}">{{ $selected_state->name }}</option>
                                    @foreach ($state as $state1)
                                    <option value="{{ $state1->id }}">{{ $state1->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><strong>District Name :</strong></label>
                                <select id='district' class="form-control" style="width: 200px">
                                    <option value="">--Select District--</option>
                                    @foreach ($district as $district1)
                                    <option value="{{ $district1->id }}">{{ $district1->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label><strong>Job Name :</strong></label>
                                <select id='job_id' class="form-control" style="width: 200px">
                                    <option value="">--Select Job--</option>
                                    @foreach ($jobs as $job)
                                    <option value="{{ $job->id }}">{{ $job->job_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label><strong>Department Name :</strong></label>
                            <select id='department' class="form-control" style="width: 200px">
                                <option value="">--Select Department--</option>
                                @foreach ($department as $department1)
                                <option value="{{ $department1->id }}">{{ $department1->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body overflow">
                    <table class="table table-bordered" id="datatable-crud">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Job Name</th>
                                <th>Job Applicant Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer-scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $(".delete").hide();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var table = $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('admin.job_applicant.index') }}",
                data: function(d) {
                    d.job_id = $('#job_id').val(),
                        d.search = $('input[type="search"]').val()
                    d.country = $('#country').val(),
                        d.search = $('input[type="search"]').val()
                    d.state = $('#state').val(),
                        d.search = $('input[type="search"]').val()
                    d.district = $('#district').val(),
                        d.search = $('input[type="search"]').val()
                    d.department = $('#department').val(),
                        d.search = $('input[type="search"]').val()
                }
            },
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'job_id',
                    name: 'job_id',
                    searchable: true
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true
                },
                // {
                //     data: 'department_id',
                //     name: 'department_id',
                //     searchable: true
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });
        $('#country').change(function() {
            table.draw();
        });
        $('#state').change(function() {
            table.draw();
        });
        $('#district').change(function() {
            table.draw();
        });
        $('#job_id').change(function() {
            table.draw();
        });
        $('#department').change(function() {
            table.draw();
        });

        $('body').on('click', '.delete', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/delete-job-application') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res) {
                            $(".delete").show();
                            var message = console.log(res.success);
                            $(".delete").append("Record has been deleted successfully");

                        }
                        var oTable = $('#datatable-crud').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        });
    });
</script>

<style>
    .customStyle {
        margin-left: 15px
    }
</style>
@endsection