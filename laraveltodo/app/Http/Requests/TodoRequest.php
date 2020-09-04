<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Rule;

class TodoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->path() == 'entry|edit')
        {
            return true;
        } else {
            return true;
        }
        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public static function rules()
    {
        return [
            'item_name' => 'required|max:100',
            'id' => [
                'required',
                Rule::exists('Users')->where(function ($query) {
                    $query->where('is_deleted', 0);
                }),
            ],
            'expire_date' => 'date',
        ];
    }

    public function messages()
    {
        return [
            'item_name.required' => '項目名は必ず入力してください。',
            'item_name.max' => '項目名は100文字以内で入力してください。',
            'id.required' => 'ユーザー名は必ず入力してください。',
            'id.exists' => 'ご入力のユーザー名は存在しないか削除されました。',
            'expire_date.date' => '正しい日付を入力してください。',
        ];
    }
}
