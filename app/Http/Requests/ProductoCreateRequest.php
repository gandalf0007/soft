<?php

namespace Soft\Http\Requests;

use Soft\Http\Requests\Request;

class ProductoCreateRequest extends Request
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
            'categoria_id' =>'required',
            'categoriasub_id' =>'required',
            'descripcioncorta' =>'required',
            'codigo' =>'required',
             'descripcion' =>'required',
        ];
    }
}
