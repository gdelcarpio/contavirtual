<script type="text/javascript">

  if ( $('#department_id').val() != '' ) {
    
      $.post("{{ URL::to('/provinces') }}/"+$('#department_id').val(),{},function(cadena){
          
            $("#province_id").html(cadena); 
            $("#province_id").val("{{ session('location.province.0') }}");
            $("#district_id").html('');

            if ( $('#province_id').val() != '' ) {

                $.post("{{ URL::to('/districts') }}/"+"{{ session('location.province.0') }}",{},function(cadena){
                  $("#district_id").html(cadena); 
                  $("#district_id").val("{{ session('location.district.0') }}");
                });

            }
      });

  }

  $('#department_id').change(function(){

    if ( $('#department_id').val() != '' ) {
      
        $.post("{{ URL::to('/provinces') }}/"+$('#department_id').val(),{},function(cadena){

            $("#province_id").html(cadena); 
            $("#district_id").html('');

        });

    }

  });

  $('#province_id').change(function(){

    if ( $('#province_id').val() != '' ) {
      
      $.post("{{ URL::to('/districts') }}/"+$('#province_id').val(),{},function(cadena){
        $("#district_id").html(cadena); 
      });

    }

  });

</script>