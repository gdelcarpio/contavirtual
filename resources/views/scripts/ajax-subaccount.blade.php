<script type="text/javascript">

	$('#account_id').change(function(){

	   	$.post("{{ URL::to('/subaccount') }}/"+$('#account_id').val(),{},function(cadena){

	        $("#subaccount").html(cadena); 
	        $("#subaccount_id").select2({placeholder: "Seleciona una Opción"});

	  	});

	});

</script>