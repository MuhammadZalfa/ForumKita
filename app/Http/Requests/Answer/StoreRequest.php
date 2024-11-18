<?php

namespace App\Http\Requests\Answer;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'answer' => 'required|string|max:1000',
        ];
    }
}
