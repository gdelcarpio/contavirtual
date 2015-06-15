{!! Form::open(['route' => url_alias(), 'method' => 'GET', 'role' => 'form', 'class' => 'form-inline']) !!} 

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

  <div class="form-group has-feedback">
    <label for="exampleInputName2">Desde</label>
    {!! Form::text('from', Input::get('from'), ['class' => 'form-control text-center', 'placeholder' => 'dd-mm-yyyy', 'required', 'id' => 'from']) !!}
    <span class="fa fa-calendar form-control-feedback"></span>
  </div>  

  <div class="form-group has-feedback">
    <label for="exampleInputEmail2">Hasta</label>
    {!! Form::text('to', Input::get('to'), ['class' => 'form-control text-center', 'placeholder' => 'dd-mm-yyyy', 'required', 'id' => 'to']) !!}
    <span class="fa fa-calendar form-control-feedback"></span>
  </div>  
      
  <button type="submit" class="btn btn-primary">Filtrar por fecha</button>
  <a href="{{ route(url_alias()) }}" class="btn btn-success">Todas las fechas</a>

{!! Form::close() !!}