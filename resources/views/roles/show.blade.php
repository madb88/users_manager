@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
            <div class="card">
                <div class="card-header">
                      {{trans('general.role')}} {{ $role->name }}
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ trans('general.role_name')}}</h5>
                      <p class="card-text">{{ $role->name }}</p>
                      <h5 class="card-title">{{ trans('general.password_policy')}}</h5>
                      <p class="card-text">{{ $role->password_policy }}</p>

                      <div class="text-right">
                            {!! Html::linkAction("RoleController@edit", trans("general.edit"), $role->id, array('title'=>trans('general.edit'),'class'=>'btn btn-outline-primary','data-toggle'=>'tooltip','data-placement'=>'top')) !!}
                    </div>
                    </div>
                  </div>
                </div>
   </div>
@endsection
<b></b>

