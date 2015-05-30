<script type="text/javascript">

	$('#add_product').click(function(){	

		if( $('#product_id').val() != undefined && $('#quantity').val() != undefined ) {

			$.post("{{ URL::to('/add-product') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){

		        $("#subaccount_select").html(cadena); 

		  	});

		}else{

			alert('Seleccione un producto y su cantidad.');

		}

	});

	$('#product_id').change(function(){

	   	$.post("{{ URL::to('/price') }}/"+$('#product_id').val()+"/"+$('#quantity').val(),{},function(cadena){

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