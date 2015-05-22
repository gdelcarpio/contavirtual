<script type="text/javascript">

$('#account_venta').change(function(){


   $.post("{{ URL::to('/subaccount') }}/"+$('#account_venta').val(),{},function(cadena){

        $("#subaccount_select").html(cadena); 

  });

});



</script>