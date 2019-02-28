@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
         @include('layout.partials.messages')
        <div class="d-flex justify-content-end create-button">
            {!! Html::linkAction("RoleController@create", trans("general.create_role"), null, array('class'=>'btn btn-lg btn-primary')) !!}
        </div>
        <div class="container">
           <div id="tag_container">
               @include('roles.table')
         </div>
        </div>
     </div>
   </div>
@endsection
