<div class="col-12">
    <h3>Add Video</h3>
    <form id="insertvideo" method="post">
        <table id="addrow" width="100%">
            <tr>
                <td><input type="button" class="btn btn-success addButton col-3 offset-1"
                        value="add" /></td>
            </tr>
        </table>
        <table class="cloning-table" width="100%">
            <tbody>
                <tr class="clonetr">
                    <td>Video Title<input type="text" id="videotitle" name="videotitle[]"
                            class="form-control"></td>
                    <td>Video description<input type="file" id="videodesc" name="videodesc[]"
                            class="form-control"></td>
                    <td>Video Links<input type="text" id="videolink" name="videolink[]"
                            class="form-control"></td>
                    <td><input type="button" class="btn btn-danger deleteButton" value="delete" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

As you know you're adding Html content after the page load, so click won't work for that tag...No worries we have a solution as below:

and find a solution here

$(document).ready(function(){
   var Data_to_clone = $('.cloning-table tbody').html();
    $(".addButton").click(function(){
        $(Data_to_clone).appendTo(".cloning-table");
    });

    $(".cloning-table").on('click','.deleteButton',function(){
        $(this).parents(".clonetr").remove();
    });
});