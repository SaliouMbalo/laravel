@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.depot.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.depots.update", [$depot->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('telephones') ? 'has-error' : '' }}">
                            <label for="telephone">{{ trans('cruds.depot.fields.telephone') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="telephones[]" id="telephones" class="form-control select2" multiple="multiple" required>
                                @foreach($telephones as $id => $telephone)
                                    <option value="{{ $id }}" {{ (in_array($id, old('telephones', [])) || isset($depot) && $depot->telephones->contains($id)) ? 'selected' : '' }}>{{ $telephone }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('telephones'))
                                <p class="help-block">
                                    {{ $errors->first('telephones') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.depot.fields.telephone_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('numero_comptes') ? 'has-error' : '' }}">
                            <label for="numero_compte">{{ trans('cruds.depot.fields.numero_compte') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="numero_comptes[]" id="numero_comptes" class="form-control select2" multiple="multiple" required>
                                @foreach($numero_comptes as $id => $numero_compte)
                                    <option value="{{ $id }}" {{ (in_array($id, old('numero_comptes', [])) || isset($depot) && $depot->numero_comptes->contains($id)) ? 'selected' : '' }}>{{ $numero_compte }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('numero_comptes'))
                                <p class="help-block">
                                    {{ $errors->first('numero_comptes') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.depot.fields.numero_compte_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('montant') ? 'has-error' : '' }}">
                            <label for="montant">{{ trans('cruds.depot.fields.montant') }}*</label>
                            <input type="number" id="montant" name="montant" class="form-control" value="{{ old('montant', isset($depot) ? $depot->montant : '') }}" step="0.01" required>
                            @if($errors->has('montant'))
                                <p class="help-block">
                                    {{ $errors->first('montant') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.depot.fields.montant_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection