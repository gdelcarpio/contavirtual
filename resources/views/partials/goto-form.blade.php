{!! Form::open(['route' => url_alias(), 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!} 

	<div class="form-inline">
	  
	  <label>Página N°:</label>
	  
	  <div class="form-group">   

		@if(Input::get('q'))

	    	{!! Form::hidden('q', Input::get('q')) !!}

	  	@endif

	  	@if(Input::get('rows'))

	    	{!! Form::hidden('rows', Input::get('rows')) !!}

	  	@endif

		@if(Input::get('column') AND Input::get('direction'))

		    {!! Form::hidden('column', Input::get('column')) !!}
		    {!! Form::hidden('direction', Input::get('direction')) !!}

		@endif

	    {!! Form::input('number','page', Input::get('page'), ['class' => 'form-controlx text-center', 'placeholder' => '#', 'required', 'id'=>'page']) !!}
	    {!! Form::submit('Ir', ['id' => 'go_to']) !!}

	  </div>

	</div>

{!! Form::close() !!}