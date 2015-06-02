<script type="text/javascript">


var subaccount_id = {{ isset($invoice->subaccount_id) ? $invoice->subaccount_id : 0 }}

if( $('#account_id').val() != '' ) {

	var subaccount_id = {{ Request::old('subaccount_id') ? Request::old('subaccount_id') : 0 }}

	get_subaccounts($('#account_id').val(), subaccount_id);

}

if ( subaccount_id ) {

	get_accounts(subaccount_id);
	$("#subaccount_id").select2("val", subaccount_id);
};

$('#account_id').change(function(){

   get_subaccounts();

});

function get_subaccounts(account_id, subaccount_id){

	if (account_id) {
		var account_id = account_id;
	}else{
		var account_id = $('#account_id').val();
	};

	$.post("{{ URL::to('/ajax-subaccounts') }}/"+account_id,{},function(cadena){

        $("#subaccount").html(cadena); 
        $("#subaccount_id").select2({placeholder: "Seleciona una opción"});
        $("#subaccount_id").select2("val", subaccount_id);

  	});
}

function get_accounts(subaccount_id){
	$.post("{{ URL::to('/ajax-accounts') }}/"+subaccount_id,{},function(account_id){

        $("#account_id").select2("val", account_id);

        get_subaccounts(account_id, subaccount_id);

  	});
}

</script>