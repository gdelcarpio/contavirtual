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
					<span>NUEVA FACTURA</span>
				</div>			
			</div>

			<div class="box-content">

            @include('errors.form')

            {!! Form::open(['route' => 'invoices.store', 'method' => 'POST', 'role' => 'form', 'class' => 'form-horizontal']) !!}
                <h3>Tipo de Venta</h3>
                <div class="row">

                    <div class="form-group">

                        <div class="col-sm-6">
                            <label class="col-sm-2 control-label">Categoría</label>
                            <div class="col-sm-9">
                                {!! Form::select('account_id', $account, '',['class' => '', 'required', 'id' => 'account_id']) !!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-sm-2 control-label">Sub Cat.</label>
                            <div class="col-sm-9" id="subaccount"></div>
                        </div>

                    </div>

                </div>

                <div class="linea"></div>
                <h3>Datos de Factura</h3>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">RUC</label>
                            <div class="col-sm-9">
                                {!! Form::select('company_id', $companies, null,['class' => '', 'required', 'id' => 'company_id']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Cliente</label>
                            <div class="col-sm-9" id="client_name">
                                No seleccionado
                            </div>
                        </div>
                   </div>

                    <div class="col-sm-6">

                        <!-- datos de la factura -->

                        <div class="form-group">
                            <label class="col-sm-2 col-xs-2 control-label">Factura</label>
                            <div class="col-sm-3 col-xs-3">
                                {!! Form::text('serial', null, ['class' => 'form-control text-center', 'placeholder' => 'Serie', 'required', 'minlength' => '2', 'maxlength' => '20', 'id' => 'serial']) !!}
                            </div>
                            <div class="col-sm-7 col-xs-7">
                                {!! Form::text('number', null, ['class' => 'form-control text-center', 'placeholder' => 'Número', 'required', 'minlength' => '2', 'maxlength' => '20', 'id' => 'number']) !!}
                            </div>
                        </div>

                        <div class="form-group has-feedback">

                            <label class="col-sm-2 control-label">Emisión</label>
                            <div class="col-sm-4">
                                {!! Form::text('issue_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd/mm/yyyy', 'required', 'id' => 'issue_date']) !!}
                                <span class="fa fa-calendar form-control-feedback"></span>
                            </div>

                            <label class="col-sm-2 control-label">Vencimiento</label>
                            <div class="col-sm-4">
                                {!! Form::text('expiration_date', null, ['class' => 'form-control text-center', 'placeholder' => 'dd/mm/yyyy', 'required', 'id' => 'expiration_date']) !!}
                                <span class="fa fa-calendar form-control-feedback"></span>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-sm-12 detalle_cabecera">
                    <div class="col-xs-6">
                        {!! Form::select("product_id", $products, null, ["class" => "product_id", "id" => "product_id"]) !!}
                    </div>

                    <div class="col-xs-1 text-center">
                        {!! Form::text("quantity", 1, ["class" => "form-control text-center", "required", "minlength" => "1", "id" => "quantity"]) !!}
                    </div>

                    <div class="col-xs-1 text-center price"> 
                       <div><span>0.00</span></div>
                    </div>
                    <div class="col-xs-2 text-center"> 
                        <a href="#" id="add_product">+ Agregar</a>
                    </div>
                    <div class="col-xs-2 text-center"> 
                        <a href="#" id="cart_clear">Limpiar lista</a>
                    </div>
                </div>
                
                <div class="col-sm-12 detalle_cabecera">

                    <div class="col-xs-6">Descripción</div>
                    <div class="col-xs-1 text-center">Cant.</div>
                    <div class="col-xs-1 text-center">Pr. unit.</div>
                    <div class="col-xs-2 text-right">Montos (Sin IGV)</div>
                    <div class="clearfix visible-xs-block"></div>

                </div>

                <div class="col-sm-12 detalle_cuerpo">
                    
                    @foreach($items as $item)
                        <div class="product-row">
                            <div class="col-xs-6">{{ $item->name }}</div>
                            <div class="col-xs-1 text-center">{{ $item->quantity }}</div>
                            <div class="col-xs-1 text-center">{{ $item->price }}</div>
                            <div class="col-xs-2 text-right" data-id="{{ $item->id }}">PEN {{ $item->price * $item->quantity }} <a href="#" class="remove_item"><i class="fa fa-times-circle" style="color:#f66"></i></a></div>
                            <div class="clearfix visible-xs-block"></div>
                        </div>
                    @endforeach
                </div>

                @include('invoices.partials.form-total')

                <div class="linea col-md-12"></div>

                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-2 text-right">
                            <label class="control-label">Anotaciones</label>
                        </div>

                        <div class="col-sm-10">
                            {!! Form::textarea('note', null, ['class' => 'form-control text-center', 'rows' => '2', 'placeholder' => 'Deja una anotación o descripción...', 'required', 'id' => 'note']) !!}
                        </div>
                    </div>
                </div>

                <div class="linea col-md-12"></div>

                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Guardar como borrador</button>
                            <button type="submit" class="btn btn-danger">Guardar Factura</button>
                        </div>
                    </div>
                </div>
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