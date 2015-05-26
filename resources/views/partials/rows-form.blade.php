{!! Form::open(['route' => Route::currentRouteName(), 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' =>'display:inline-block']) !!}

  <label>Número de filas:</label>
  
  <div class="form-group">   
	@if(Input::get('column') AND Input::get('direction'))
    {!! Form::hidden('column', Input::get('column')) !!}
    {!! Form::hidden('direction', Input::get('direction')) !!}
    @endif
    {!! Form::select('rows', $rows, Input::get('rows'), ['class' => 'form-control', 'id' => 'rows', 'onchange' => 'this.form.submit()']) !!}

  </div>

{!! Form::close() !!}