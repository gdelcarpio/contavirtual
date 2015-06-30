function DemoSelect2(){

	$('#company_id').select2({
		placeholder: "Busque RUC",

		 formatNoMatches: function(term) {
		    return '<a href="#">Agregar Cliente</a>';	 }   

	});

// creacion de factura
	$("#account_id, #invoice_type_id, #subaccount_id, #invoice_id, #department_id, #province_id, #district_id").select2({placeholder: "Selecione una opción"});

	$(".product_id").select2({
		placeholder: "Seleciona un Producto",

		formatNoMatches: function(term) {return '<a href="#">Agregar Producto o Servicio</a>';}
	});

	$('#s2_clientes').select2({
		placeholder: "Seleccione un cliente",

		 formatNoMatches: function(term) {
		    return '<a href="#">Agregar Cliente</a>';}   
	});

}

$(document).ready(function() {


	$('.detalle_cuerpo').on('click','.remove_item',function(e){
			e.preventDefault();
			//$('.detalle_producto:last').remove();
			$(this).parent('div').parent('div').remove();

	});

	// Create Wysiwig editor for textare
	// TinyMCEStart('#wysiwig_simple', null);
	// TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#payment_date, #payment_expiration_date, #start_date, #end_date, #expiration_date, #issue_date, #from, #to, #date').datepicker({ dateFormat:'dd-mm-yy',setDate: new Date()});
	// Load Timepicker plugin
	// LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	// LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();

});