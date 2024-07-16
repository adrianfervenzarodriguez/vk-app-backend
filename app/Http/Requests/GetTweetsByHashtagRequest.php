<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetTweetsByHashtagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $this->merge([
            'hashtag' => $this->route('hashtag'),
            'getFromExternal' => $this->get('getFromExternal')
        ]);
    }

    public function rules(): array
    {
        return [
            'hashtag' => 'required|string|max:50',
            'getFromExternal' => 'nullable|digits_between:0,1'
        ];
    }
}
