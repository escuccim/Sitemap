<?php

namespace Escuccim\Sitemap\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return isUserAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
        	'uri' 	=> 'required',
        	'priority'	=> 'required|integer|max:10|min:1',
        	'changefreq'	=> 'required',
        ];
    }
}
