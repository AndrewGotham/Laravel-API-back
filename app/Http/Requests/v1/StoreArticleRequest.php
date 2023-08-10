<?php

namespace App\Http\Requests\v1;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreArticleRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'sometimes|required|string|unique:articles,title|min:3|max:255',
            'body' => 'required|min:10',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be of type string',
            'title.unique' => 'This title is already used, must be unique',
            'body.required' => 'Body required',
            'body:min' => 'Body must contain at least 10 characters',
        ];
    }

//     protected function prepareForValidation()
//    {
//        $this->merge([
//            'user_id' => auth()->id() ?? 1,
//            'slug' => Str::slug($this->title),
//        ]);
//    }

//     protected function passedValidation(): void
//    {
//        $this->merge([
//         'user_id' => auth()->id() ?? 1,
//         'slug' => Str::slug($this->title),
//        ]);
//    }
}
