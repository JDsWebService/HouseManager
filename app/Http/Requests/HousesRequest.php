<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HousesRequest extends FormRequest
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
            'name'              => 'required|string|max:255|min:3',
            'gender'            => 'required|string|max:6|min:4',
            'max_occupants'     => 'required|integer',
            'address'           => 'required|string|max:255|min:15',
            'rent'              => 'required|numeric'
        ];
    }
}
