@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.affectation.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.affectation.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $affectation->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Employé
                                    </th>
                                    <td>
                                        @foreach($affectation->users as $id => $user)
                                            <span class="label label-info label-many">{{ $user->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Agences
                                    </th>
                                    <td>
                                        @foreach($affectation->agences as $id => $agences)
                                            <span class="label label-info label-many">{{ $agences->nom }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.affectation.fields.date_affectation') }}
                                    </th>
                                    <td>
                                        {{ $affectation->date_affectation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.affectation.fields.date_depart') }}
                                    </th>
                                    <td>
                                        {{ $affectation->date_depart }}
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