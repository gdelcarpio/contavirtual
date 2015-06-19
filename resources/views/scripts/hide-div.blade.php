<script type="text/javascript">
$(document).ready(function(){

  	var exist = {{ isset($invoice) ? 1 : 0 }};

  	if (exist) {

	    hideInputForms();

  	}

    $('#invoice_type_id').change(function(){

    	hideInputForms();

    });

  	function hideInputForms(){
  		
    	var type = $('#invoice_type_id').val();

    	if (type != 1)
    	{
  			$(".ruc-inputs").prop('disabled', true);
    		$('.company').fadeOut(500);

    	}else{
  			$(".ruc-inputs").prop('disabled', false);
    		$('.company').fadeIn(500);
    	}

  	}

 });
</script>