<script type="text/javascript">

	// AJAX ADD PRODUCT TO CART

	$('#add_product').click(function(){	

		if( $('#product_id').val() != '' && $('#quantity').val() != '' ) {

			$.post("{{ URL::to('/add-product') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){

		        $(".detalle_cuerpo").append(cadena);

		        $('#quantity').val(1);
					
		  	}).fail(function() {
				alert('Producto ya agregado');
			});

		}else{

			alert('Seleccione un producto y su cantidad.');

		}

	});

	// AJAX EMPTY CART

	$('#cart_clear').click(function(){	

		$.post("{{ URL::to('/clear-cart') }}",{},function(cadena){

        // $(".detalle_cuerpo").append(cadena); 

		alert('Lista de productos vacía.');

		});

	});



	// AJAX PRODUCT PRICE

	$('#product_id').change(function(){

	   	$.post("{{ URL::to('/price') }}/"+$('#product_id').val()+"/1",{},function(cadena){

	   		$('#quantity').val(1);
	        $(".price").html(cadena); 

	  	});

	});

	// AJAX PRODUCT PRICE x QUANTITY

	if ( $('#quantity').val() != '' && $('#product_id').val() != '' ) {
    
	    $.post("{{ URL::to('/price') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){
	      	$(".price").html(cadena); 
	    });

	}

  	$('#quantity').blur(function(){

    	if ( $('#quantity').val() != '' && $('#product_id').val() != '' ) {
      
      		$.post("{{ URL::to('/price') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){
        	$(".price").html(cadena); 
      	});

    }

  });

</script>