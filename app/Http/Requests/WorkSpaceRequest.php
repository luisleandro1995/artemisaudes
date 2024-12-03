<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkSpaceRequest extends FormRequest

{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return ['name' => 'max:255|required'];
    }

}
?>
