<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoursesRequest extends FormRequest
{
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
            'nom' => 'required',
            'enseignant' => 'required',
            'image' => $this->route('id') ? 'image|mimes:png,jpg,jpeg,webp' : 'required|image|mimes:png,jpg,webp,jpeg'
        ];
    }
}
