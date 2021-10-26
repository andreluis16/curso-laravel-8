<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMusic extends FormRequest
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
        $id = $this->segment(2);

        $rules =  [
            'band' => ['required', 'min:2', 'max:160', "unique:posts,title,{$id},id"],
            'name' => ['required', 'min:2', 'max:160'],
            'lyrics' => ['required', 'min:100', 'max:10000'],
            'album' => ['required', 'image']
        ];

        if($this->method() == 'PUT'){
            $rules['image'] = ['nullable', 'image'];
        }
        return $rules;
    }
}
