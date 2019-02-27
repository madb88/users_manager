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
       <div class="row">
           @lang('general.roles')
        </div>
        <div>

            {!! Html::linkAction("RoleController@create", trans("general.create"), null, array('class'=>'btn btn-success')) !!}

        </div>

        <div class="container">
           <div id="tag_container">
               @include('roles.table')
         </div>
        </div>
     </div>
   </div>
@endsection
<b></b>