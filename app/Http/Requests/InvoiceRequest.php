<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class InvoiceRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */

	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */

	public function rules()
	{

		return [
            'invoice_type_id'		=> 'required|exists:invoice_types,id',
            'invoice_category_id'	=> 'required|exists:invoice_categories,id',
            'company_id'			=> 'required|exists:companies,id',
            'serial'     			=> 'required|max:15',
            'number'     			=> array('required', 'max:20', 'regex:/^[0-9]+$/'),
            'issue_date'   			=> 'required|date',
            'expiration_date'		=> 'required|date',
            'note'     				=> 'required|max:300',
            'subaccount_id'			=> 'required|exists:subaccounts,id',
            'igv'					=> 'required_if:invoice_category_id,2|numeric',
            'total'					=> 'required_if:invoice_category_id,2|numeric',
        ];

	}

}
