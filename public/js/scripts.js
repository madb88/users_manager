$(document).ready(function() {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function () {
      $('[data-toggle="tooltip"]').tooltip()
});

  var setDefaultActive = function() {
    var path = window.location.href;
    var element = $(".nav-item a[href='" + path + "']");
    element.addClass("active");
  }

setDefaultActive()

$(".navbar .nav-link").on("click", function(){
    $(".nav-link").find(".active").removeClass("active");
    $(this).addClass("active");
});


$(window).on('hashchange', function() {
  if (window.location.hash) {
      var page = window.location.hash.replace('#', '');
      if (page == Number.NaN || page <= 0) {
          return false;
      }else{
          getData(page);
      }
  }
});

$(document).ready(function()
{
  $(document).on('click', '.pagination a',function(event)
  {
      event.preventDefault();

      $('li').removeClass('active');
      $(this).parent('li').addClass('active');

      var page=$(this).attr('href').split('page=')[1];

      getData(page);
  });

});

bindDeleteClick();

function bindDeleteClick(){
  $(".delete-record").click(function(){
    event.preventDefault();

    if (!confirm('Are you sure you want to delete?')) return;
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");
    var route = $(this).data("route");

    deleteRecord(id,token,route);
 });
}

function getData(page){
  $.ajax(
  {
     headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
      url: '?page=' + page,
      type: "get",
      datatype: "html"
  }).done(function(data){
      $("#tag_container").empty().html(data);
      bindDeleteClick();
      location.hash = page;
  }).fail(function(jqXHR, ajaxOptions, thrownError){
        alert('No response from server');
  });
}

function deleteRecord(id,token,route){
  $.ajax(
    {
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: route+ "/" +id,
      type: 'DELETE',
      data: {
        "id": id,
        "_token": token
      }
    }).done(function (data){
      var page = window.location.hash.replace('#', '');
      getData(page)
    });
  }
});
