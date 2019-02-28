@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
         @include('layout.partials.messages')
        <div class="d-flex justify-content-end create-button">
            {!! Html::linkAction("UserController@create", trans("users.create_user"), null, array('class'=>'btn btn-lg btn-primary')) !!}
        </div>

        <div class="container">
           <div id="tag_container">
               @include('users.table')
         </div>
        </div>
     </div>
   </div>
@endsection
