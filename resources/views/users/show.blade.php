@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
           <div class="card mb-3">
                <div>
                    <h2 class="card-header">{{ $user->name }}</h2>
                </div>
                <div class="row no-gutters">
                  <div class="col-md-2">
                    <img src="{{$user->gravatar}}" class="card-img" alt="...">
                  </div>
                  <div class="col-md-10">
                    <div class="card-body">
                        <p class="head">{{ trans('general.name')}}</p>
                        <p class="subtext">{{ $user->name }}</p>

                        <p class="head">{{trans('general.email')}}</p>
                        <p class="subtext">{{ $user->email }}</p>

                        <p class="head">{{trans('general.created')}}</p>
                        <p class="subtext">{{ $user->created_at }}</p>

                        <p class="head">{{trans('general.role')}}</p>
                        <p class="subtext">{{ $user->role->name }}</p>

                        <div class="text-right">
                            {!! Html::linkAction("UserController@edit", trans("general.edit"), $user->id, array('title'=>trans('general.edit'),'class'=>'btn btn-outline-primary','data-toggle'=>'tooltip','data-placement'=>'top')) !!}
                        </div>
                    </div>
                  </div>
              </div>
        </div>
           <div class="col-md-12">
            @if(!empty($user->twitter_handle))
                {!! $user->twitter !!}
            @endif
           </div>
        </div>
     </div>
   </div>
@endsection
<b></b>

