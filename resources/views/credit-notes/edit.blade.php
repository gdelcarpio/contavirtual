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
					<span>EDITAR NOTA DE CRÉDITO - {{ $credit_note->id }} </span>
				</div>			
			</div>

			<div class="box-content">

            @include('errors.form')

            {!! Form::model($credit_note, ['route' => [$page['update'], $credit_note->id ], 'method' => 'PATCH', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                
               @include('credit_notes.partials.form', ['submitButton' => 'ACTUALIZAR'])
               
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