<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormsRequest extends FormRequest

{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return ['name' => 'max:255|required',
                'publication_date' => 'required',
                'end_date' => 'required'];
    }

}
?>
