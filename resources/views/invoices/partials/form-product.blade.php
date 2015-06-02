<div class="product-row">
	<div class="col-xs-6">{{ $product->name }}</div>
	<div class="col-xs-1 text-center">{{ $product->quantity }}</div>
	<div class="col-xs-1 text-center">{{ $product->price }}</div>
	<div class="col-xs-2 text-right" data-id="{{ $product->id }}">PEN {{ $product->price * $product->quantity }} <a href="#" class="remove_item"><i class="fa fa-times-circle" style="color:#f66"></i></a></div>
	<div class="clearfix visible-xs-block"></div>
</div>