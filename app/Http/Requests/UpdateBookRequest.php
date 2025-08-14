<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
        $bookId = $this->route('book'); // الحصول على معرف البوست من الرابط

    return [
        'name' => 'required|min:3|string|unique:books,name,' . $bookId,
        'author' => 'required|min:3|string',
        'description' => 'required|min:3|string' ,
        'user_id' => 'required|integer|exists:users,id',
        'available_copies' => 'required|integer',
        'price' => 'required|integer',
        'publish_year' => 'required|date',
        'photo' => 'sometimes|image|mimes:jpg,jpeg,png,gif|max:2048',
        'category_id' => 'required|exists:categories,id',
    ];
    }
}
