{{ Form::open(array('url' => 'api/v1/login')) }}

{{ Form::token(); }}

  <div class="col-sm-2">
    {{ Form::label('email', 'E-Mail Address') }}
  </div>

{{ Form::close() }}