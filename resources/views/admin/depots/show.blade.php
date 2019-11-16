@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.depot.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.depot.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $depot->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Téléphone
                                    </th>
                                    <td>
                                        @foreach($depot->telephones as $id => $telephone)
                                            <span class="label label-info label-many">{{ $telephone->telephone }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        N° Compte
                                    </th>
                                    <td>
                                        @foreach($depot->numero_comptes as $id => $numero_compte)
                                            <span class="label label-info label-many">{{ $numero_compte->numero }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.depot.fields.montant') }}
                                    </th>
                                    <td>
                                        ${{ $depot->montant }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection