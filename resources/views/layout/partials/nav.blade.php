<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">{{trans('menu.home')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="/users">{{trans('menu.users')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/roles">{{trans('menu.roles')}}</a>
        </li>
        <li class="nav-item">
            {!! Form::open(['url' => array('lang_select'), 'method'=>'POST']) !!}
                {{ Form::select('language', ['pl' => 'Polish', 'en' => 'English'], App::getLocale(), ['onchange'=>'this.form.submit()']) }}
            {!! Form::close() !!}
        </li>
      </ul>
    </div>
  </nav>