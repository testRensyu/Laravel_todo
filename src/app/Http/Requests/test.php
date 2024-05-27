<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
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
            'onamae' => 'required|string|max:20',
            'mail_address' => 'required|string|max:100',
            'message' => 'required|string|max:255',
            'image' => 'image|max:2048',

        ];
    }
}
