<?php

namespace App\Http\Requests\materi;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMateriRequest extends FormRequest
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
            'judul' => ['string'],
            'id_mapel' => ['numeric'],
            'id_kategori' => ['numeric'],
            "gambar" =>  ['image', 'mimes:jpeg,png,jpg', 'max:1048'],
            'video' => ['mimes:mp4,mkv'],
            'file_materi' => ['mimes:pdf', 'max:30000'],
        ];
    }
}
