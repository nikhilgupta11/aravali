<a href="{{ route('admin.jobeligibilities.show',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    <i class='fa fa-eye'></i>
    </a>
<a href="{{ route('admin.jobeligibilities.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    <i class='fa fa-edit'></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>