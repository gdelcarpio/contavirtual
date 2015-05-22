<script type="text/javascript">

$('#select_account').change(function(){


   $.post("{{ URL::to('/subaccount') }}/"+$('#select_account').val(),{},function(cadena){

        $("#subaccount_select").html(cadena); 
        $("#subaccount_venta").select2({placeholder: "Seleciona una Opción"});

  });

});



</script>