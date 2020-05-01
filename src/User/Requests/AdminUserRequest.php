<?php

namespace AvoRed\Framework\User\Requests;

use AvoRed\Framework\Catalog\Models\Property;
use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
        $rules['first_name'] = 'required';
        $rules['last_name'] = 'required';
        $rules['role_id'] = 'required';
        if (strtoupper($this->method()) === 'POST') {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }


        return $rules;
    }
}
