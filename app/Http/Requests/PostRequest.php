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
            'name' => 'required|max:50',
            'category' => 'required',
            'condition' => 'required',
            'price' => 'required|numeric|max:10000000',
            'memo' => 'required',
            'image_path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '入力必須です',
            'name.max' => '50文字以内で入力してください',
            'category.required' => '入力必須です',
            'condition.required' => '入力必須です',
            'price.required' => '入力必須です',
            'price.numeric' => '価格は数値で入力してください',
            'price.max' => '価格は10,000,000までの値を入力してください',
            'memo.required' => '入力必須です',
            'image_path.required' => '選択してください',
        ];
    }
}
