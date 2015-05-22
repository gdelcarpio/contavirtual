<script type="text/javascript">

$('#account_venta').change(function(){


   $.post("{{ URL::to('/subaccount') }}/"+$('#account_venta').val(),{},function(cadena){

        $("#subaccount_select").html(cadena); 

        $("#subaccount_venta").select2({placeholder: "Seleciona un Producto"});

  });

});



</script>