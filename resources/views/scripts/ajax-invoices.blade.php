<script>

	var invoice_id = {{ isset($credit_note->invoice_id) ? $credit_note->invoice_id : 0 }}
	var company_id = {{ isset($credit_note->invoice->company->id) ? $credit_note->invoice->company->id : 0 }}

	// alert(invoice_id + '-' + company_id);

	function getInvoices(company_id,invoice_id){

		if (company_id) {
			var company_id = company_id;
		}else{
			var company_id = $('#company_id').val();
		};

	   	$.post("{{ URL::to('/ajax-invoices') }}/"+company_id,{},function(cadena){

	        $("#invoice").html(cadena); 
	        $("#invoice_id").select2({placeholder: "Seleciona una opción"});
	        $("#invoice_id").select2("val", invoice_id);
			$("#company_id").select2("val", company_id);

	  	});

	}

	if (invoice_id) {

		getInvoices(company_id, invoice_id);

	};

	$('#company_id').change(function(){

		getInvoices();

	});
	
	if ( $('#company_id').val() != '' ) {

		var invoice_id = {{ Request::old('invoice_id') ? Request::old('invoice_id') : 0 }}
		getInvoices(null,invoice_id);

	}
</script>