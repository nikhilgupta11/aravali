@extends('layout.admin.layout')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="card">
               <h3 class="text-center"> State List</h3>
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
                                <th>Country Name</th>
                                <th>State Name</th>
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
            ajax: "{{ url('admin/states') }}",
            columns: [{
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'country_id',
                    name: 'country_id',
                    searchable: true
                },
                {
                    data: 'name',
                    name: 'name',
                    searchable: true
                },
                {
                    data: 'status',
                    name: 'status',
                    render: function(data, type, row) {

                        if (data == '1') {

                            return 'Active';

                        } else {

                            return 'Inactive';

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
                    url: "{{ url('admin/delete-state') }}",
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
@endsection