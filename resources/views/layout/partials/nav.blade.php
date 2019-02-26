<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Menu</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="/users">@lang('users.users')<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
        {!! Form::open(['url' => array('lang_select'), 'method'=>'POST']) !!}
          {{ Form::token() }}
          {{ Form::select('language', ['pl' => 'Polish', 'en' => 'English'], App::getLocale(), ['onchange'=>'this.form.submit()']) }}
        {!! Form::close() !!}
        </li>
      </ul>
    </div>
  </nav>