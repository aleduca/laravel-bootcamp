<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
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
    return [
      'email' => 'required|email',
      'password' => 'required|min:3',
      'password_confirmation' => 'same:password'
    ];
  }

  public function messages(): array
  {
    return [
      'email.required' => 'O campo :attribute é obrigatório❌',
      'email.email' => 'O campo email tem que ser um email',
      'password.required' => 'O campo password é obrigatório❌',
      'password.min' => 'O campo password tem que ter pelo menos :min caracteres',
      'password_confirmation.same' => 'O campo de confirmação da senha tem que ser igual a senha',
    ];
  }
}
