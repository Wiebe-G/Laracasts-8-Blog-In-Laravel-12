<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Request;

class UpdateUserInformation extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(Request $request):bool
	{
		return true;
    }

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return array_merge([
			'username' => ['required', 'max:255'],
			'name' => ['required', 'max:255'],
			'avatar' => ['sometimes', 'nullable', 'image'],
			'email' => ['required', 'email', 'max:255'],
			'bio' => ['nullable', 'max:255'],
		], $this->isMethod('POST') || $this->filled('password') ?  [
			'password' => ['sometimes', 'nullable', 'current_password'],
			'new_password' => [
				'sometimes',
				'nullable',
				'confirmed',
				Password::min(8)
					->letters()
					->mixedCase()
					->numbers()
			],
		] : []);
	}
}
