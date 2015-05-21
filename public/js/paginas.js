




function DemoSelect2(){
	$('#s2_with_tag').select2({placeholder: "Select OS"});
	$('#s2_country').select2();

$('#s2_ruc').select2({
		placeholder: "Escriba el RUC",

		 formatNoMatches: function(term) {
		    return '<a href="#">Agregar Cliente</a>';	 }   

	});

// creacion de factura
	$("#venta_categoria").select2({placeholder: "Selecione una opción"});
	$("#venta_subcategoria").select2({placeholder: "Selecione una opción"});
	$("#documento_tipo").select2({placeholder: "Selecione un tipo de documento"});

	$("#prod_item1").select2({
		placeholder: "Seleciona un Producto",

		formatNoMatches: function(term) {return '<a href="#">Agregar Producto o Servicio</a>';}

	});
	$('#s2_clientes').select2({
		placeholder: "Seleccione un cliente",

		 formatNoMatches: function(term) {
		    return '<a href="#">Agregar Cliente</a>';	 }   

	});




}
// Run timepicker
function DemoTimePicker(){
	$('#input_time').timepicker({setDate: new Date()});
}






$(document).ready(function() {
//carga la subcategoria en factura

    $('#venta_categoria').change(function(){

        //alert('salio el cambio');

    });


	//--------funcion para crear botones de crear documentos-----

// 		function LoadAjaxContent(url){
// 	$('.preloader').show();
// 	$.ajax({
// 		mimeType: 'text/html; charset=utf-8', // ! Need set mimeType only when run from local file
// 		url: url,
// 		type: 'GET',
// 		success: function(data) {
// 			$('#ajax-content').html(data);
// 			$('.preloader').hide();
// 		},
// 		error: function (jqXHR, textStatus, errorThrown) {
// 			alert(errorThrown);
// 		},
// 		dataType: "html",
// 		async: false
// 	});
// }

		
		
	// 	$('.crear_documento').click( function(e){
	// 	//alert("hola");
			
	// 	e.preventDefault();
	// 	//	$('#content').removeClass('full-content');

	// 	var url = $(this).attr('href');
	// 	window.location.hash = url;
	// 	LoadAjaxContent(url);
		
	// });

//----FIN----funcion para crear botones de crear documentos-----



//---------agregar y eliminar productos en factura y boletas----------

var item = 1;

$('#agregar_producto').click(function(e){	

item++;	

e.preventDefault();

		
		$('.detalle_cuerpo').append('<div class="form-group detalle_producto"><div class="col-xs-8"><select class="populate placeholder" id="prod_item'+item+'"  name="country" ><option></option><option value="1">20514159069  </option><option value="2">875421549</option></select></div><div class="col-xs-1 text-center"><input type="text" class="form-control" placeholder="" name="serie" /></div><div class="col-xs-1 text-center"><input type="text" class="form-control" placeholder="" name="serie" /></div><div class="col-xs-2 text-right">PEN 0.00 <a href="#" class="eliminar_producto"><i class="fa fa-times-circle" style="color:#f66"></i></a></div></div>');


			$("#prod_item"+item).select2({
				placeholder: "Seleciona un Producto",

				formatNoMatches: function(term) {
				  return '<a href="#">Agregar Producto o Servicio</a>';
		 }

	});




	});





	$('.detalle_cuerpo').on('click','.eliminar_producto',function(e){
			e.preventDefault();
			//$('.detalle_producto:last').remove();
			$(this).parent('div').parent('div').remove();

	});

//-----FIN----agregar y eliminar productos en factura y boletas----------





	// Create Wysiwig editor for textare
	// TinyMCEStart('#wysiwig_simple', null);
	// TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#fecha_emision').datepicker({setDate: new Date()});
	$('#fecha_vencimiento').datepicker({setDate: new Date()});
	// Load Timepicker plugin
	LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();




});