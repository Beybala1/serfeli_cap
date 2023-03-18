<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|string|max:255',
            'description'=>'required|string',
            'image'=>'image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        return [
            'image.image'=>'Daxil edilən məlumat şəkil formatında deyil',
            'image.mimes:jpeg,png,jpg,gif'=>'Daxil edilən məlumat jpeg,png və jpg formatında deyil',
        ];
    }
}
