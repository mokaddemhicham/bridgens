<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationsRequest extends FormRequest
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
            'theme' => 'required',
            'animateur' => 'required',
            'date' => 'required',
            'heure' => 'required',
            'lieu' => 'required',
            'affiche' => $this->route('id') ? 'image|mimes:png,jpg,jpeg' : 'required|image|mimes:png,jpg,jpeg'
        ];
    }
}
