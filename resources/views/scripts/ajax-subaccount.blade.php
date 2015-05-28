<script type="text/javascript">

$('#select_account').change(function(){


   $.post("{{ URL::to('/subaccount') }}/"+$('#select_account').val(),{},function(cadena){

        $("#subaccount_select").html(cadena); 
        $("#subaccount_venta").select2({placeholder: "Seleciona una Opción"});

  });

});

$('#add_product').click(function(e){	

	// e.preventDefault();

	if ( $('#product_id').val() != undefined && $('#quantity').val() != undefined) {

		$.post("{{ URL::to('/add-product') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){

	        $("#subaccount_select").html(cadena); 

	  	});
	}else{
		alert('Seleccione un producto y su cantidad.');
	}

});

$('#product_id').change(function(){


   $.post("{{ URL::to('/price') }}/"+$('#product_id').val(),{},function(cadena){

        $(".price").html(cadena); 

  });

});


</script>