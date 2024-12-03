<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkSpaceUserRequest extends FormRequest

{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return ['user_id' => 'required',
                'work_space_id' => 'required'];
    }

}
?>
