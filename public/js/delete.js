$(document).ready(function() {

    $(".delete-record").click(function(){
        if (!confirm('Are you sure you want to delete?')) return;

        var id = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");
        var route = $(this).data("route");
        deleteRecord(id,token,route);

    });

    function deleteRecord(id,token,route){
        $.ajax(
            {
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: route+ "/" +id,
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