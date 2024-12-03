<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTypeRequest extends FormRequest

{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return ['level' => 'max:255|required'];
    }

}
?>
