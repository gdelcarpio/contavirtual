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




<form id="defaultForm" method="post" action="validators.html" class="form-horizontal">
        <h3>Tipo de Venta</h3>
        <div class="row">


            <div class="form-group">

        <div class="col-sm-6">
            <label class="col-sm-2 control-label">Categoría</label>
                    <div class="col-sm-9">
                         {!! Form::select('account', $account, '',['class' => '', 'required', 'id' => 'select_account']) !!}

                    </div>

        </div>
        <div class="col-sm-6">

        <label class="col-sm-2 control-label">Sub Cat.</label>
                    <div class="col-sm-9" id="subaccount_select">                        
                        
                    </div>
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
                                        

                                        {!! Form::select('ruc', $companies, null,['class' => '', 'required', 'id' => 'select_ruc']) !!}


                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Cliente</label>
                                    <div class="col-sm-9" id="client_date">
                                        <input type="text" class="form-control" placeholder="" name="serie"/>
                                    </div>
                                </div>

       </div>




        <div class="col-sm-6">


        <!-- datos de la factura -->

                                <div class="form-group">
                                    <label class="col-sm-2 col-xs-2 control-label">Factura</label>
                                    <div class="col-sm-3 col-xs-3">
                                        <input type="text" class="form-control" placeholder="Serie" name="serie" />
                                    </div>
                                    <div class="col-sm-7 col-xs-7">
                                        <input type="text" class="form-control" placeholder="Número" name="numero" />
                                    </div>
                                </div>



                                <div class="form-group has-feedback">

                                    <label class="col-sm-2 control-label">Emisión</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="fecha_emision" class="form-control" name="date_emision" placeholder="dd/mm/yyyy">
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                    </div>

                                    <label class="col-sm-2 control-label">Vencimiento</label>
                                    <div class="col-sm-4">
                                        <input type="text" id="fecha_vencimiento" class="form-control" name="date_emision" placeholder="dd/mm/yyyy">
                                        <span class="fa fa-calendar form-control-feedback"></span>
                                    </div>

                                </div>


        </div>

        </div>











                            <div class="col-sm-12 detalle_cabecera">

                                <div class="col-xs-8">Descripción</div>
                                <div class="col-xs-1 text-center">Cant.</div>
                                <div class="col-xs-1 text-center">Pr. unit.</div>
                                <div class="col-xs-2 text-right">Montos (Sin IGV)</div>
                                <div class="clearfix visible-xs-block"></div>

                            </div>

        <div class="col-sm-12 detalle_cuerpo">



            <div class="form-group detalle_producto">

                    <div class="col-xs-8">
                        <select id="prod_item_1">
                            <option></option>
                            @foreach($products as $product)
                            <option value="{{ $product->id }}"> {{ $product->name}} </option>
                            @endforeach
                        </select>

                       <p>{{ Auth::user()->name }}</p>

                    </div>

                    <div class="col-xs-1 text-center">
                        {!! Form::text('cant_1', 1, ['class' => 'form-control text-center', 'required', 'minlength' => '1', 'id' => 'cant_1']) !!}
                    </div>
                    <div class="col-xs-1 text-center">
                        {!! Form::text('price_1', null, ['class' => 'form-control text-center', 'required', 'minlength' => '1', 'id' => 'price_1']) !!}
                    </div>
                    <div class="col-xs-2 text-right">PEN <span id="monto_1">0.00</span> <a href="#" class="eliminar_producto"><i class="fa fa-times-circle" style="color:#f66"></i></a></div>

            </div>



        </div>


            <div class="col-sm-12 detalle_cabecera">

                <a href="#" id="agregar_producto">+ Agregar nuevo item</a>

            </div>



        <div class="col-sm-4 col-sm-offset-8">

        <div class="row" style="padding-bottom:10px">
                <div class="col-xs-6">Subtotal</div>
                <div class="col-xs-6 text-right">PEN 100.00</div>
                <div class="clearfix visible-xs-block"></div>
            </div>

            <div class="row" style="padding-bottom:10px">
                        <div class="col-xs-6">IGV</div>
                        <div class="col-xs-6 text-right">PEN 18.00</div>
                        <div class="clearfix visible-xs-block"></div>
                </div>

        <div class="row detalle_cabecera" style="padding:10px 0px" >
                <div class="col-xs-6">Total</div>
                <div class="col-xs-6 text-right">PEN 118.00</div>
                <div class="clearfix visible-xs-block"></div>

        </div>


        </div>






        <div class="linea col-md-12"></div>



        <div class="row">
            <div class="form-group">
                    <div class="col-sm-2 text-right">
                            <label class="control-label">Anotaciones</label>
                    </div>

                    <div class="col-sm-10">
                            <textarea class="form-control"  rows="2" placeholder="Dejar una anotación o comentatrio"></textarea>
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
</form>

			</div>
		</div>
	</div>

</div>

@endsection

@section('scripts')

    @include('scripts.ajax-subaccount')
    @include('scripts.ajax-client')

@endsection