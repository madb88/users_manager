@extends('layout.main')
@section('content')
   <div class="album text-muted">
        <div class="container col-lg-4 col-md-6 col-sm-12">
        @if(isset($role['id']) && $role['id'] > 0)
        <div class="row">
                <h1>{{ trans('general.update_role')}}</h1>
            </div>
            {!! Form::open(['action' => ['RoleController@update', $role['id']], 'method'=>'PATCH']) !!}
            {!! Form::hidden('id',$role['id']) !!}
        @else
        <div class="row">
                <h1>{{ trans('general.create_role')}}</h1>
            </div>
            {!! Form::open(['action' => ['RoleController@store','method'=>'POST']]) !!}
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

            {!! Form::label('roles.role_name', trans('roles.role_name'),array('class'=>'control-label')) !!}
            {!! Form::text('name', isset($role['name']) ? $role['name']:'', array('class'=>'form-control','placeholder'=> trans('roles.role_name'))) !!}

            {!! Form::label('password_policy', trans('general.password_policy'),array('class'=>'control-label')) !!}
            {!! Form::text('password_policy', isset($role['password_policy']) ? $role['password_policy']:'', array('class'=>'form-control','placeholder'=> trans('general.password_policy'))) !!}

            {!! Form::submit(trans('general.submit') ,array('class'=>'btn btn-primary btn-lg btn-block submit-form-button')) !!}
            <a href="{{route('roles.index')}}" class="btn btn-danger btn-lg btn-block">{{ trans('general.back')}}</a>

        </div>
        {!! Form::close() !!}

     </div>
   </div>
@endsection
<b></b>