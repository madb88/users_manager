@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
           @lang('users.users')
        </div>
        <div>
            
            {!! Html::linkAction("UserController@create", trans("users.create"), null, array('class'=>'btn btn-success')) !!}

        </div>
     </div>
   </div>
@endsection
<b></b>