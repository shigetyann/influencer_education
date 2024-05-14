<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'posted_date' =>'required|date_format:Y-m-d',
            'title' => 'required|max:255',
            'article_contents' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'posted_date.required' => '投稿日時は必須です。',
            'title.required' => 'タイトルは必須です。',
            'article_contents.required' => '本文は必須です。',
            
        ];
    }
}
