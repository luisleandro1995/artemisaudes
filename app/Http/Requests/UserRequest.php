<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest

{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return ['name' => 'max:255|required',
                'last_name' => 'max:255|required',
                'document_number' => 'max:255|required',
                'email' => 'max:255|required',
                'password' => 'max:255|required'];
    }

}
?>
