<script type="text/javascript">

	$('#add_product').click(function(){	

		if( $('#product_id').val() != '' && $('#quantity').val() != '' ) {

			$.post("{{ URL::to('/add-product') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){

		        $(".detalle_cuerpo").append(cadena); 

		  	});

		}else{

			alert('Seleccione un producto y su cantidad.');

		}

	});

	$('#product_id').change(function(){

	   	$.post("{{ URL::to('/price') }}/"+$('#product_id').val()+"/1",{},function(cadena){

	   		$('#quantity').val(1);
	        $(".price").html(cadena); 

	  	});

	});

	// AJAX PRICE x QUANTITY

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