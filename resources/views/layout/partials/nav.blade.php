<nav class="navbar nav-pills nav-justified navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand menu-item-home" href="/">{{trans('menu.home')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link menu-item" href="{{route('users.index')}}">{{trans('menu.users')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-item" href="{{route('roles.index')}}">{{trans('menu.roles')}}</a>
        </li>
      </ul>
      <li class="form-inline my-2 my-lg-0">
          {!! Form::open(['url' => array('lang_select'), 'method'=>'POST']) !!}
          {{Form::label('language', trans('menu.languages'), ['class'=>'menu-language'])}}

          {{ Form::select('language', ['pl' => 'Polish', 'en' => 'English'], App::getLocale(), ['onchange'=>'this.form.submit()']) }}
            {!! Form::close() !!}
      </li>
    </div>
  </nav>
