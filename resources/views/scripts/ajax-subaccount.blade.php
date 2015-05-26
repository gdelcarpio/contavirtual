<script type="text/javascript">

$('#select_account').change(function(){


   $.post("{{ URL::to('/subaccount') }}/"+$('#select_account').val(),{},function(cadena){

        $("#subaccount_select").html(cadena); 
        $("#subaccount_venta").select2({placeholder: "Seleciona una Opción"});

  });

});



var item = 1;

$('#agregar_producto').click(function(e){	

item++;	

e.preventDefault();
		
		$('.detalle_cuerpo').append('<div class="form-group detalle_producto"><div class="col-xs-8"><select class="populate placeholder" id="prod_item_'+item+'" name="select_product" ><option></option>@foreach($products as $prod)<option value="1">{{ $prod->name}}</option>@endforeach</select></div><div class="col-xs-1 text-center"><input type="text" class="form-control text-center" value="1" name="cant_'+item+'" /></div><div class="col-xs-1 text-center"><input type="text" class="form-control text-center" placeholder="" name="price_'+item+'" /></div><div class="col-xs-2 text-right">PEN 0.00 <a href="#" class="eliminar_producto"><i class="fa fa-times-circle" style="color:#f66"></i></a></div></div>');

		//$('.detalle_cuerpo').append('<div class="form-group detalle_producto"><div class="col-xs-8">{!! Form::select("select_product", $products, "",["required", "id" => "prod_item'+item+'"]) !!}</div><div class="'+item+'col-xs-1 text-center"><input type="text" class="form-control" placeholder="" name="cant" /></div><div class="col-xs-1 text-center"><input type="text" class="form-control" placeholder="" name="serie" /></div><div class="col-xs-2 text-right">PEN 0.00 <a href="#" class="eliminar_producto"><i class="fa fa-times-circle" style="color:#f66"></i></a></div></div>');

		$("#prod_item_"+item).select2({
			placeholder: "Seleciona un Producto",

			formatNoMatches: function(term) 
			{
				return '<a href="#">Agregar Producto o Servicio</a>';
			}

		});

		$('#prod_item_'+item).change(function(){

		});

	});

</script>