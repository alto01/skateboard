<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post.body' => 'required|string|max:500',
            
        ];
    }
    
    public function attributes()
    {
        return [
            'post.body' => '本文',
            'image' => '画像'
        ];
    }
}
