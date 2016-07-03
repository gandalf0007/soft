<?php

namespace Soft\Http\Requests;

use Soft\Http\Requests\Request;

class UserCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //esto autoriza al request
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
       'nombre' =>'required',
        'apellido' =>'required',
        'email' =>'required',
        'password' =>'required',
        're_password' =>'required',
        ];
    }
}
