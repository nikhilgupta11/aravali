@extends('layout.admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-success float-end" href="{{ route('admin.jobs.create') }}"> <i class="fa fa-plus" aria-hidden="true"></i> Create Jobs</a>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="alert alert-success delete">

                </div>
                <div class="card-body overflow">
                    <table class="table table-bordered" id="datatable-crud">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Job Title</th>
                                <th>Country Name</th>
                                <th>State Name</th>
                              
                                <th>Department Name</th>
                                <th>Salary</th>
                                <th>No Of Post</th>
                                <th>Status</th>
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
        $('#datatable-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.jobs.index') }}",
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'job_title',
                    name: 'job_title',
                    searchable: true
                },
                {
                    data: 'country_id',
                    name: 'country_id',
                    searchable: true
                },
                {
                    data: 'state_id',
                    name: 'state_id',
                    searchable: true
                },
               
                {
                    data: 'department_id',
                    name: 'department_id',
                    searchable: true
                },
                {
                    data: 'salary',
                    name: 'salary',
                    searchable: true
                },
                {
                    data: 'no_of_post',
                    name: 'no_of_post',
                    searchable: true
                },

                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {

                        if (data == 0) {

                            return 'Inactive';

                        } else {

                            return 'Active';

                        }
                    },
                    searchable: true
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'asc']
            ]
        });
        $('body').on('click', '.delete', function() {
            if (confirm("Delete Record?") == true) {
                var id = $(this).data('id');
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('admin/delete-jobs') }}",
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
@endsection('content')