<script type="text/javascript">

	// AJAX ADD PRODUCT TO CART

	$('#add_product').click(function(e){	

		e.preventDefault();

		if( $('#product_id').val() != '' && $('#quantity').val() != '' ) {

			$.post("{{ URL::to('/add-product') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){

		        $(".detalle_cuerpo").append(cadena);

		        $('#quantity').val(1);

				$('.remove_item').click(remove_item);
					
				get_cart_total();

		  	}).fail(function() {
				alert('Producto ya agregado');
			});

		}else{

			alert('Seleccione un producto y su cantidad.');

		}


	});

	function get_cart_total(){
		$.post("{{ URL::to('/cart-total') }}",{},function(cadena){

	        $(".total").html(cadena);
					
		 });
	}

	// AJAX EMPTY CART

	$('#cart_clear').click(clear_cart);

	function clear_cart(){

		$.post("{{ URL::to('/clear-cart') }}",{},function(cadena){

	        $(".detalle_cuerpo").html(''); 

			alert('Lista de productos vacía.');

		});

		get_cart_total();

	}

	// AJAX REMOVE ITEM

	$('.remove_item').click(remove_item);

	function remove_item(){

		var row = $(this).parents('div');

		var id = row.data('id');

		$.post("{{ URL::to('/remove-item') }}/"+id,{},function(){

			alert('Producto quitado de la lista');

		});

		get_cart_total();
		
	}

	// AJAX COMPANY NAME

	function client_name(){

	   	$.post("{{ URL::to('/ajax-company') }}/"+$('#company_id').val(),{},function(cadena){

	        $("#client_name").html(cadena); 

	  	});

	}

	$('#company_id').change(function(){

		client_name();

	});
	
	if ( $('#company_id').val() != '' ) {
		
		client_name();

	}

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

  	$('#igv').blur(function(){

    	if ( $('#igv').val() != '' ) {
      
      		$.post("{{ URL::to('/igv') }}/"+$('#igv').val(),{},function(cadena){
        		$(".total").html(cadena); 
      		});

    	}

  	});

</script>