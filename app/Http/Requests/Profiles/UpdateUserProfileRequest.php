<?php

namespace App\Http\Requests\Profiles;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
            // 'student_no' => ['required', 'unique:users'],
            // 'image' => ['required',],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'position_id' => ['required'],
        ];
    }
    public function messages()
    {
        return [
            // 'image.image' => 'The image should only be jpg, jpeg, png, bmp, gif, svg, or webp'
        ];
    }
}
