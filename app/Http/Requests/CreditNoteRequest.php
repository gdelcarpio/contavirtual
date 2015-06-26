<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreditNoteRequest extends Request {

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
            'invoice_id'	=> 'required|exists:invoices,id',
            'date'	   		=> 'required|date',
            // 'note'     				=> 'required|max:300',
            'description' 	=> 'required|max:300',
            'subtotal'		=> 'required|numeric',
            'igv'			=> 'required|numeric',
            'total'			=> 'required|numeric',
        ];

	}

}
