<script type="text/javascript">

  var request = {{ Request::old('department_id') ? 1 : 0 }}

  var user = {{ isset($user) ? 1 : 0 }}

  if (request != 0) {
    var department_id = {{ Request::old('department_id') ? Request::old('department_id') : 0 }}
    var province_id   = {{ Request::old('province_id') ? Request::old('province_id') : 0 }}
    var district_id   = {{ Request::old('district_id') ? Request::old('district_id') : 0 }}
  }else{
    if (user) {
      var department_id = {{ $user->department_id ? $user->department_id : 0 }}
      var province_id   = {{ $user->province_id ? $user->province_id : 0 }}
      var district_id   = {{ $user->district_id ? $user->district_id : 0 }}
    };
  };

  if ( $('#department_id').val() != '' ) {

    get_provinces(department_id, province_id);

    $("#province_id").val(province_id);
    
      if ( $('#province_id').val() != '' ) {
        get_districts(province_id, district_id);
        $("#district_id").select2("val", district_id);
      }

  }

  function get_provinces(department_id, province_id)
  {
    $.post("{{ URL::to('/provinces') }}/"+department_id,{},function(cadena){

      $("#province_id").html(cadena); 
      $("#province_id").select2({placeholder: "Seleccione"});
      $("#province_id").select2("val", province_id);
      $("#district_id").select2({placeholder: "Seleccione"});

    });
  }

  $('#department_id').change(function(){

    if ( $('#department_id').val() != '' ) {

      var department_id = $('#department_id').val();
      
      get_provinces(department_id);
      $("#district_id").html('');

    }

  });

  function get_districts(province_id, district_id)
  {
    $.post("{{ URL::to('/districts') }}/"+province_id,{},function(cadena){
      $("#district_id").html(cadena); 
      $("#district_id").select2("val", district_id);
    });
  }

  $('#province_id').change(function(){

    if ( $('#province_id').val() != '' ) {
      
      var province_id = $('#province_id').val();
      get_districts(province_id);

    }

  });

</script>