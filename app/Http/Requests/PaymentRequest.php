<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaymentRequest extends Request {

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
            'user_id'					=> 'sometimes|required|exists:users,id',
            'payment_date'     			=> 'required|date',
            'payment_expiration_date' 	=> 'required|date',
            'amount'     				=> 'required|numeric',
            'invoice'     				=> 'required',
            'start_date'     			=> 'required|date',
            'end_date'     				=> 'required|date',
            'code'     					=> 'required',
        ];

	}

}
