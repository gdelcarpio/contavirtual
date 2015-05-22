<script type="text/javascript">

$('#select_ruc').change(function(){

	
   $.post("{{ URL::to('/client_ajax') }}/"+$('#select_ruc').val(),{},function(cadena){

        $("#client_date").html(cadena); 
      

  });

});



</script>