function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();

	$('#select_ruc').select2({
		placeholder: "Busque RUC",

		 formatNoMatches: function(term) {
		    return '<a href="#">Agregar Cliente</a>';	 }   

	});

// creacion de factura
	$("#select_account").select2({placeholder: "Selecione una opción"});
	//$("#subaccount_venta").select2({placeholder: "Selecione una opción"});
	$("#documento_tipo").select2({placeholder: "Selecione un tipo de documento"});

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


	$('.detalle_cuerpo').on('click','.eliminar_producto',function(e){
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
	$('#fecha_emision').datepicker({setDate: new Date()});
	$('#fecha_vencimiento').datepicker({setDate: new Date()});
	$('#payment_date, #payment_expiration_date, #start_date, #end_date').datepicker({setDate: new Date()});
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