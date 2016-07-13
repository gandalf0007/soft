<?php

namespace Soft\Http\Requests;

use Soft\Http\Requests\Request;

class ClienteUpdateRequest extends Request
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
            'nombre' =>'required',
            'direccion' =>'required',
            'telefono' =>'required',
            'cuit' =>'required',
        ];
    }
}
