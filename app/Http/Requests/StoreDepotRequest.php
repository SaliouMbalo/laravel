<?php

namespace App\Http\Requests;

use App\Depot;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreDepotRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('depot_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'telephones.*'     => [
                'integer',
            ],
            'telephones'       => [
                'required',
                'array',
            ],
            'numero_comptes.*' => [
                'integer',
            ],
            'numero_comptes'   => [
                'required',
                'array',
            ],
            'montant'          => [
                'required',
            ],
        ];
    }
}
