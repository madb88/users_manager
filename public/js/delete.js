$(document).ready(function() {


    
    $(".delete-user").click(function(){
        if (!confirm('Are you sure you want to delete?')) return;

        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
    
        deleteUser(id,token);

    
    });

    function deleteUser(id,token){
        $.ajax(
            {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: "users/"+id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (){
                    $('#'+id).remove();
                },
            });
    }
});