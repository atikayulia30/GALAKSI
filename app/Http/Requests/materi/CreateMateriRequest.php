<?php

namespace App\Http\Requests\materi;

use Illuminate\Foundation\Http\FormRequest;

class CreateMateriRequest extends FormRequest
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
            "gambar" =>  'required|image|mimes:jpeg,png,jpg|max:1048',
            'video' => ['required', 'mimes:mp4,mkv'],
            'file_materi' => ['mimes:pdf', 'max:30000'],
        ];
    }
}
