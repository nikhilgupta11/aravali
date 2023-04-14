<a href="{{ route('admin.department.show',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    <i class='fa fa-eye'></i>
    </a>
<a href="{{ route('admin.department.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
    <i class='fa fa-edit'></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $id }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
        <i class="fa fa-trash" aria-hidden="true"></i>
    </a>

    <button type="button" class="btn btn-primary view_district mt-1" data-toggle="modal" onClick="divFunction(this.id)" id="{{$id}}" data-target="#exampleModal">
        View Distict
       </button>
       
       <!-- Modal -->
       <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Job District</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
                 
              
               <p class="district-listing"> </p>
              
               
             </div>
             <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
           </div>
         </div>
       </div>
       <script>
     
     function divFunction(clicked_id){
         //Some code
     
         var id = $(this).attr('id');
        
          var url =    "{{ url('admin/get-department-district') }}";
       
         //Some code
     
          $.ajax({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
             url : url,
             data : {'job_id':clicked_id},
             type : 'GET',
             dataType : 'json',
             success : function(result){
              $(".modal-body").append(result.html);
               $('#exampleModal').on('hidden.bs.modal', function () {
                location.reload();
                });
                 console.log("===== " + result + " =====");
     
             }
         });
     
     }