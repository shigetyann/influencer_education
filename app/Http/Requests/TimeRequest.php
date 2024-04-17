<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'curriculums_id' =>'required|max:10|integer',
            'delivery_from' => 'required|date_format:Y-m-d H:i',
            'delivery_to' => 'required|date_format:Y-m-d H:i',

        ];
    }

    public function attributes() {
        return [
            'curriculums_id' => 'カリキュラムID',
            'delivery_from' => '公開開始日',
            'delivery_to' => '公開終了日',
        ];
    }

    public function messages() {
        return [
            'curriculums_id.required' => ':attributeは必須項目です。',
            'delivery_from.required' => ':attributeは必須項目です。',
            'delivery_to.required' =>':attributeは必須項目です。',
            'delivery_from' => ':attributeは:Y-m-d H:i形式で入力してください。',
            'delivery_to' => ':attributeは:Y-m-d H:i形式で入力してください。',
        ];
    }


}
