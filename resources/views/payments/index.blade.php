@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">LISTA DE PAGOS</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12">
		
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6 text-right">
				<div class="btn-group">
				  <a href="{{ route('payments.create') }}"  class="btn btn-danger">
				    <i class="fa fa-plus"></i> Agregar Pago
				  </a>
				</div>
			</div>
		</div>

	<div class="row">
		<hr class="dividor">

		<div class="col-md-6">

			<form class="form-inline" style="display:inline-block">
			  <div class="form-group">		    
			    <input type="text" class="form-control" id="exampleInputName2" placeholder="buscar">
			  </div>		  
			  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			</form>
			|
			@include('partials.rows-form')

		</div>

		<div class="col-md-6 text-right">

			<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

		    <form id="pog1" method="get" style="display:inline-block" >
	        	<input id="pag_actual1" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
		    </form>
	   
	    	<a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               

		</div>

	</div>

		<div class="box">
		
			<div class="box-content no-padding">
				@include('payments.partials.table-list')
			</div>

		</div>
		
		{!! $payments->setPath('')->appends(array('q' => Input::get('q') ,'column' => Input::get('column'),'direction' => Input::get('direction')))->render() !!}

		<!-- paginado inferior -->

	</div>

{{--     <div class="col-md-6">
	    Mostrando 23 de 1520 resultados
	</div>
	<div class="col-md-6 text-right">

		<a href="#" class="btn btn-primary "><i class="fa  fa-angle-left"></i></a>

	    <form id="pog2" method="get" style="display:inline-block" >
	        <input id="pag_actual2" size="3" name="pag" value="" type="text" style="text-align:center"> de 100
	    </form>
	   
	    <a href="#" class="btn btn-primary"><i class="fa  fa-angle-right"></i></a>               

	</div> --}}

</div>

<!-- DELETE FORM -->

{!! Form::open([ 'route' => ['payments.destroy', ':ROW_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}

{!! Form::close() !!}


@endsection

@section('ajax-scripts')

  @include('scripts.ajax-delete')

@endsection