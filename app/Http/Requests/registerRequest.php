<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class registerRequest extends Request {

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
			'phone' => 'required|unique:user|max:8|min:8',
                        'password' => 'required'
		];
	}

}
