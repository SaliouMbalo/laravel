<?php

namespace App\Http\Requests;

use App\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'prenoms'   => [
                'required',
            ],
            'name'      => [
                'required',
            ],
            'email'     => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'telephone' => [
                'min:7',
                'max:11',
                'required',
                'unique:users,telephone,' . request()->route('user')->id,
            ],
            'code_id'   => [
                'required',
                'integer',
            ],
            'roles.*'   => [
                'integer',
            ],
            'roles'     => [
                'required',
                'array',
            ],
        ];
    }
}
