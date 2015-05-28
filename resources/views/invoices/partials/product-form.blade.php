<div class="col-xs-8">
	{!! Form::select("product_id", $products, null, ["class" => "product_id", "id" => "product_id"]) !!}
</div>

<div class="col-xs-1 text-center">
    {!! Form::text("quantity", 1, ["class" => "form-control text-center", "required", "minlength" => "1", "id" => "quantity"]) !!}
</div>

<div class="col-xs-1 text-center price"> 
   <div><span>0.00</span></div>
</div>

{{-- <div class="col-xs-2 text-right">PEN <span id="monto_1">0.00</span> <a href="#" class="eliminar_producto"><i class="fa fa-times-circle" style="color:#f66"></i></a></div> --}}