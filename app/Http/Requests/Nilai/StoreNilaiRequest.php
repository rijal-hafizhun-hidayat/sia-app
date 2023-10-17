<?php

namespace App\Http\Requests\Nilai;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreNilaiRequest extends FormRequest
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
            'numeric' => 'format salah',
            'min_digits' => 'nilai minimal 1',
            'max_digits' => 'nilai maksimal 100'
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
            'user_id' => 'required|numeric',
            'mapel_id' => 'required|numeric',
            'tahun_ajaran_id' => 'required|numeric',
            'nilai_uts' => 'required|numeric|min_digits:1|max_digits:100',
            'nilai_uas' => 'required|numeric|min_digits:1|max_digits:100'
        ];
    }
}
