@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
         @if (\Session::has('success'))
         <div class="alert alert-success" role="alert">
               {!! \Session::get('success') !!}
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
            </div>
         @endif
        <div class="d-flex justify-content-end create-button">
            {!! Html::linkAction("UserController@create", trans("users.create_user"), null, array('class'=>'btn btn-lg btn-success')) !!}
        </div>

        <div class="container">
           <div id="tag_container">
               @include('users.table')
         </div>
        </div>
     </div>
   </div>
@endsection
<b></b>