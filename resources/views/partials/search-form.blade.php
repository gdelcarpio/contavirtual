@if(url_alias()=='users.payments.index')
	{!! Form::open(['route' => [url_alias(), $user->id], 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!}
@else
	{!! Form::open(['route' => url_alias(), 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!}
@endif

	<div class="form-group">
		{!! Form::input('search','q', Input::get('q'), ['class' => 'form-control', 'placeholder' => 'Ingrese su búsqueda...', 'required']) !!}

		@if(Input::get('column') AND Input::get('direction'))
	    	{!! Form::hidden('column', Input::get('column')) !!}
	    	{!! Form::hidden('direction', Input::get('direction')) !!}
	    @endif

		@if(Input::get('rows'))
	    	{!! Form::hidden('rows', Input::get('rows')) !!}
	    @endif

  		<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	</div>

{!! Form::close() !!}