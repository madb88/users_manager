@extends('layout.main')
@section('content')
   <div class="album text-muted">
        <div class="container col-lg-4 col-md-6 col-sm-12">
            <div class="row">
                <h1>{{ trans('general.create_role')}}</h1>
            </div>
            @if (\Session::has('error'))
                <div class="alert alert-danger" role="alert">
                      {!! \Session::get('error') !!}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                   </div>
                @endif
        @if(isset($role['id']) && $role['id'] > 0)
            {!! Form::open(['action' => ['RoleController@update', $role['id']], 'method'=>'PATCH']) !!}
            {!! Form::hidden('id',$role['id']) !!}
        @else
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

            {!! Form::label('name', trans('general.name'),array('class'=>'control-label')) !!}
            {!! Form::text('name', isset($role['name']) ? $role['name']:'', array('class'=>'form-control','placeholder'=> trans('general.name'))) !!}

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