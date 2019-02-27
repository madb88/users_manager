@extends('layout.main')
@section('content')
   <div class="album text-muted">
     <div class="container">
       <div class="row">
           <h1>{{ trans('general.user')}}</h1>
        </div>
        @if(isset($user['id']) && $user['id'] > 0)
            {!! Form::open(['action' => ['UserController@update', $user['id']], 'method'=>'PATCH']) !!}
            {!! Form::hidden('id',$user['id']) !!}
        @else
            {!! Form::open(['action' => ['UserController@store','method'=>'POST']]) !!}
        @endif
        {{ Form::token() }}
        <div class="form-group">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ trans($error) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {!! Form::label('name', trans('general.name'),array('class'=>'control-label')) !!}
            {!! Form::text('name', isset($user['name']) ? $user['name']:'', array('class'=>'form-control', 'placeholder'=>trans('general.name'))) !!}

            {!! Form::label('email', trans('general.email'),array('class'=>'control-label')) !!}
            {!! Form::email('email', isset($user['email']) ? $user['email']:'', array('class'=>'form-control', 'placeholder'=>trans('general.email'))) !!}

            {!! Form::label('password', trans('general.password'),array('class'=>'control-label')) !!}
            {!! Form::password('password',array('class'=>'form-control','placeholder'=>trans('general.password'))) !!}

            {!! Form::label('re_password', trans('general.re_password'),array('class'=>'control-label')) !!}
            {!! Form::password('re_password', array('class'=>'form-control','placeholder'=>trans('general.re_password'))) !!}

            {!! Form::label('twitter_handle', trans('general.twitter_handle'),array('class'=>'control-label')) !!}
            {!! Form::text('twitter_handle', isset($user['twitter_handle']) ? $user['twitter_handle']:'', array('class'=>'form-control','placeholder'=>trans('general.twitter_handle'))) !!}
            
            {!! Form::label('roles', trans('general.roles'),array('class'=>'control-label')) !!}
            {!! Form::select('role', $roles, isset($user['role_id']) ? $user['role_id']:'', ['placeholder' => trans('general.please_select') ]) !!}


            {!! Form::submit(trans('general.submit') ,array('class'=>'btn btn-success')) !!}
        </div>
        {!! Form::close() !!}

     </div>
   </div>
@endsection
<b></b>