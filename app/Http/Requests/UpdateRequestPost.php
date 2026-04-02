<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequestPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        //Lấy id của bài viết đang cập nhật
        $id = $this->route('id');
        return [
            'title' => ['required', 'min:6', 'max:255', 'unique:posts,title,' . $id],
            'image' => ['nullable', 'image'],
            'description' => ['nullable'],
            'content'   => 'required|min:2',
            'category_id' => ['required', 'integer']
        ];
    }
}
