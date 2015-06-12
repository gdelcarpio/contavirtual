@extends('app')

@section('content')

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<ol class="breadcrumb">
			<li><a href="index.html">Productos</a></li>
			<li><a href="index.html">Crear</a></li>
		</ol>
	</div>
</div> 

<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">

			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-file-text-o"></i>
					<span>NUEVO COMPROBANTE DE PAGO</span>
				</div>			
			</div>

			<div class="box-content">

            @include('errors.form')

            {!! Form::open(['route' => 'invoices.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                
               @include('invoices.partials.form', ['submitButton' => 'INGRESAR'])
               
            {!! Form::close() !!}

			</div>
		</div>
	</div>

</div>

@endsection

@section('ajax-scripts')

    @include('scripts.ajax-products')
    @include('scripts.ajax-subaccount')
    @include('scripts.ajax-client')

@endsection