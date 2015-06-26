<script>
	function getInvoices(invoice_id){

	   	$.post("{{ URL::to('/ajax-invoices') }}/"+$('#company_id').val(),{},function(cadena){

	        $("#invoice").html(cadena); 
	        $("#invoice_id").select2({placeholder: "Seleciona una opción"});
	        $("#invoice_id").select2("val", invoice_id);

	  	});

	}

	$('#company_id').change(function(){

		getInvoices();

	});
	
	if ( $('#company_id').val() != '' ) {

		var invoice_id = {{ Request::old('invoice_id') ? Request::old('invoice_id') : 0 }}
		getInvoices(invoice_id);

	}
</script>