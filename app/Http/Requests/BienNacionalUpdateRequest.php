<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienNacionalUpdateRequest extends FormRequest
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
        return [
            'codigo_subcat' => 'required|exists:tab_subcat',
            'codigo_dep'    => 'required|exists:tab_depart',
            'codigo_cat'    => 'required|exists:tab_catego',

            'codigo_bien'    => 'required|unique:tab_bienes,codigo_bien,'.$this->bienes_nacionale->codigo_bien.',codigo_bien',
            'nombre_bien'    => 'required|string',
            'satus_bien'     => 'required|in:Operativo,No Existe,Inoperativo,En Reparación,Por Verificar',
            'fecha_bien'     => 'required|date',
            'file1'          => 'nullable|file',
            'file2'          => 'nullable|file',

        ];
    }
}
