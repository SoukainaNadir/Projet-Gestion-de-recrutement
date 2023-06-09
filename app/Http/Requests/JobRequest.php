<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
            'title' => 'required|min:3|max:100',
            'description' => 'required|min:10|max:1000',
            'location' => 'required|min:3|max:100',
            'image'=>$this->route('slug') ? 'image|mimes:png,jpg,jpeg|max:2048':'required|image|mimes:png,jpg,jpeg|max:2048'
        ];
    }
}
