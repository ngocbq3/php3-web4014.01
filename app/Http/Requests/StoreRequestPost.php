<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequestPost extends FormRequest
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
        return [
            'title' => ['required', 'min:6', 'max:255', 'unique:posts,title'],
            'image' => ['required', 'image'],
            'description' => ['nullable'],
            'content'   => 'required|min:2',
            'category_id' => ['required', 'integer']
        ];
    }

    public function messages(): array
    {
        return [
            'title.unique' => 'Tiêu đề đã tồn tại',
            'title.required' => 'Yêu phải nhật tiêu đề',
            'title.min' => 'Tiêu đề phải có ít nhất 6 ký tự',
            'title.max' => 'Tiêu đề không được quá 255 ký tự',
            'image.required' => 'Yêu cầu phải có ảnh',
            'image.image' => 'File phải là ảnh',
            'content.required' => 'Yêu cầu phải có nội dung',
            'content.min' => 'Nội dung phải có ít nhất 2 ký tự',
            'category_id.required' => 'Yêu cầu phải chọn danh mục',
            'category_id.integer' => 'Danh mục phải là số nguyên'
        ];
    }
}
