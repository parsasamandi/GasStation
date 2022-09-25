<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Providers\EnglishConvertion;
use Illuminate\Http\Request;

class StoreUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'name' => 'required',
            'password' => 'required|min:6',
            'password-confirm' => 'same:password',
            'email' => 'email:rfc,dns|required|max:255|unique:users,email,' . $request->get('id')
        ];
    }
    
}
