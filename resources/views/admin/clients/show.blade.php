@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.client.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $client->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.prenoms') }}
                                    </th>
                                    <td>
                                        {{ $client->prenoms }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.nom') }}
                                    </th>
                                    <td>
                                        {{ $client->nom }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.adresse') }}
                                    </th>
                                    <td>
                                        {{ $client->adresse }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $client->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.telephone') }}
                                    </th>
                                    <td>
                                        {{ $client->telephone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.salaire_actuel') }}
                                    </th>
                                    <td>
                                        ${{ $client->salaire_actuel }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.profession') }}
                                    </th>
                                    <td>
                                        {{ $client->profession }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.employeur') }}
                                    </th>
                                    <td>
                                        {{ $client->employeur }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.numero_identification') }}
                                    </th>
                                    <td>
                                        {{ $client->numero_identification }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                    <ul class="nav nav-tabs">

                    </ul>
                    <div class="tab-content">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection