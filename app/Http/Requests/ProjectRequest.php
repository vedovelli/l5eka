<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProjectRequest extends Request {

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
			'name' => 'required',
			'owner' => 'required',
			'categories' => 'required',
			'users' => 'required',
			'description' => 'required',
		];
	}

	public function messages()
	{
		return [
			'name.required' => 'Nome é obrigatório',
			'owner.required' => 'Líder é obrigatório',
			'categories.required' => 'Categorias é obrigatório',
			'users.required' => 'Membros é obrigatório',
			'description.required' => 'Descrição é obrigatória',
		];
	}

}
