{!! Form::open(['route' => url_alias(), 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline', 'style' => 'display:inline-block']) !!} 

	<div class="form-inline">
	  
	  <label>Página N°:</label>
	  
	  <div class="form-group">  

		@if(Input::get('role'))

			{!! Form::hidden('role', Input::get('role')) !!}

		@endif

		@if(Input::get('q'))

	    	{!! Form::hidden('q', Input::get('q')) !!}

	  	@endif

		@if(Input::get('column') AND Input::get('direction'))

		    {!! Form::hidden('column', Input::get('column')) !!}
		    {!! Form::hidden('direction', Input::get('direction')) !!}

		@endif

	  	@if(Input::get('rows'))

	    	{!! Form::hidden('rows', Input::get('rows')) !!}

	  	@endif

		@if(Input::get('from') AND Input::get('to'))

		    {!! Form::hidden('from', Input::get('from')) !!}
		    {!! Form::hidden('to', Input::get('to')) !!}

		@endif

	    {!! Form::text('page', Input::get('page'), ['class' => 'form-control text-center', 'size' => 3, 'placeholder' => '#', 'required', 'id'=>'page']) !!}
	    
	    {!! Form::submit('Ir', ['id' => 'go_to']) !!}

	  </div>

	</div>

{!! Form::close() !!}