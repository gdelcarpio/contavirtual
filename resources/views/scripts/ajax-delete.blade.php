<script type="text/javascript">
  $(document).ready(function(){
  
    $('.row-delete').click(function(){

      var row = $(this).parents('tr');
      var type = row.data('type');
      var name = row.data('name');
      
      var response = confirm('¿Desea eliminar ' +  type + ' ' + name +'? \n (¡No podrá recuperarse el registro!)');

      if (response == true) {

          var id = row.data('id');
          var form = $('#form-delete');

          var url = form.attr('action').replace(':ROW_ID', id);

          var data = form.serialize();

          row.fadeOut(500);

          $.post(url, data, function(result) {

            var mensaje = $('<div/>', {
                    'id'    : 'mensaje'
                });

            $("#message").prepend(mensaje)
            $("#mensaje").html(result).delay(3000).slideUp(300); 
           
          });

      };

    });

  });
</script>