<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurriculumRequest extends FormRequest
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
            'title' => 'required|max:255|string',
            'thumbnail' => 'nullable|max:255|string',
            'description' => 'nullable|max:1000|string',
            'video_url' => 'nullable|max:1000|url',
            'alway_delivery_flg' => 'required|max:4|tinyInteger',
            'grade_id' => 'required|max:10|integer',
        ];
    }

    public function attributes() {
        return [
            'title' => '授業タイトル',
            'thumbnail' => 'サムネイル',
            'description' => '授業概要',
            'video_url' => '動画URL',
            'alway_delivery_flg' => '常時公開',
            'grade_id' => 'クラスID',
            'curriculums_id' => 'カリキュラムID',
            'delivery_from' => '公開開始日',
            'delivery_to' => '公開終了日',
        ];
    }

    public function messages() {
        return [
            'title.required' => ':attributeは必須項目です。',
            'description.max' => ':attributeは:max字以内で入力してください。',
            'video_url.url' => ':attributeはURL形式で入力してください。',
            'alway_delivery_flg.required' => ':attributeは必須項目です。',
            'grade_id.required' => ':attributeは必須項目です。',
            'curriculums_id.required' => ':attributeは必須項目です。',
            'delivery_from.required' => ':attributeは必須項目です。',
            'delivery_to.required' =>':attributeは必須項目です。',
            'delivery_from' => ':attributeは:Y-m-d H:i形式で入力してください。',
            'delivery_to' => ':attributeは:Y-m-d H:i形式で入力してください。',
        ];
    }
}
