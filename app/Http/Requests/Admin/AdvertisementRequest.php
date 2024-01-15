<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $img_rules = 'image|mimes:jpeg,webp,png,jpg,gif,svg|max:2048';
        $img_url =  request()->isMethod('put') ? 'nullable|'.$img_rules : 'required|'.$img_rules;

        $video_rules = 'file|mimetypes:video/mp4|max:10240';
        $video_url = request()->isMethod('put') ? 'nullable|'.$video_rules : 'required|'.$video_rules;

        return [
            'language_id'       => 'required',
            'video_website'       => 'required',
            'img_website'       => 'required',
            'img_url'       =>  $img_url,
            'video_url'       => $video_url,
        ];
    }
}
