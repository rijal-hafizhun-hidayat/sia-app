<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateUsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function messages(): array
    {
        return [
            'required' => 'wajib diisi',
            'string' => 'format salah',
            'numeric' => 'format salah',
            'email' => 'format email salah'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nis' => 'nullable|numeric',
            'nama' => 'required|string',
            'role' => 'required|numeric',
            'username' => 'required|string',
            'email' => 'email:rfc,dns',
            'kelas_id' => 'nullable|numeric',
            'gender' => 'required|string',
            'nip' => 'nullable|numeric'
        ];
    }
}
