<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'numeroFuncionario' => [
                'required', 'min:5'
            ],
            'nome' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email',
                function () {
                    Rule::unique((new User)->getTable())->ignore($this->route()->user ?? null);
                },
            ],
            'telefone' => [
                'required', 'min:9', 'max:9'
            ],
            'password' => [
                $this->route()->user ? 'required_with:password_confirmation' : 'required', 'nullable', 'confirmed', 'min:6'
            ],
            'password_confirmation' => [
                'required', 'min:6'
            ],
            'acn' => [
                'required', 'min:1'
            ],
        ];
    }
}
