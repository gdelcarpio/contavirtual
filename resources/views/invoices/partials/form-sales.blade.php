{{-- <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-sm-2 control-label">IGV %</label>
            <div class="col-sm-4">
                {!! Form::text('igv', null, ['class' => 'form-control text-center', 'placeholder' => 'Sólo números' ,'required', 'minlength' => '2', 'maxlength' => '4', 'id' => 'igv']) !!}
            </div>
        </div>
    </div>
</div> --}}

<div class="col-sm-12 detalle_cabecera">
    <div class="col-xs-6">
        {!! Form::select("product_id", $options['products'], null, ["class" => "product_id", "id" => "product_id"]) !!}
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