<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            'title' => 'string|max:100|min:5|required',
            'description' => 'string|min:20|max:50|required',
            'post_image_file_name' => 'image|required',
            'date_of_publication' => 'date|after:today|required',
        ];
    }
}
