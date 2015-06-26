<script>
	function getInvoices(){

	   	$.post("{{ URL::to('/ajax-invoices') }}/"+$('#company_id').val(),{},function(cadena){

	        $("#invoice_id").html(cadena); 
	        $("#invoice_id").select2({placeholder: "Seleciona una opción"});

	  	});

	}

	$('#company_id').change(function(){

		getInvoices();

	});
	
	if ( $('#company_id').val() != '' ) {
		
		getInvoices();

	}
</script>