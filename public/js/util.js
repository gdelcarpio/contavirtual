$(function(){
	$('select').each(function(index, el) {
		if($(el).attr('disabled') != "disabled" || $(el).val() != ""){
			$(this).removeAttr('disabled');
		}
	});
		
	$("#department_id").on('change', function (e) {
		var url = "/departament";
		var id  = $(this).val();
		$.get(url+'?id='+id, function(data){
			$('#province_id, #district_id').empty();
		  	agregarCombo('#province_id', data);
		});
    });

    $("#province_id").on('change', function (e) {
		var url = "/province";
		var id = $("#province_id").val();
		$.get(url+'?id='+id, function(data){
			$('#district_id').empty();
			agregarCombo('#district_id', data);
		});
    });

    function agregarCombo(cbo, data){
    	$(cbo).append("<option value='' disabled selected style='display:none;'>Seleccione</option>");
		$(cbo).removeAttr('disabled');
		$.each(data, function (index, value) {
		    $(cbo).append("<option value='" + index + "'>" + value + "</option>");
		});
    }
    
});
