@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.affectation.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.affectations.update", [$affectation->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label for="user">{{ trans('cruds.affectation.fields.user') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="users[]" id="users" class="form-control select2" multiple="multiple" required>
                                @foreach($users as $id => $user)
                                    <option value="{{ $id }}" {{ (in_array($id, old('users', [])) || isset($affectation) && $affectation->users->contains($id)) ? 'selected' : '' }}>{{ $user }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <p class="help-block">
                                    {{ $errors->first('users') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.affectation.fields.user_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('agences') ? 'has-error' : '' }}">
                            <label for="agences">{{ trans('cruds.affectation.fields.agences') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="agences[]" id="agences" class="form-control select2" multiple="multiple" required>
                                @foreach($agences as $id => $agences)
                                    <option value="{{ $id }}" {{ (in_array($id, old('agences', [])) || isset($affectation) && $affectation->agences->contains($id)) ? 'selected' : '' }}>{{ $agences }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('agences'))
                                <p class="help-block">
                                    {{ $errors->first('agences') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.affectation.fields.agences_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('date_affectation') ? 'has-error' : '' }}">
                            <label for="date_affectation">{{ trans('cruds.affectation.fields.date_affectation') }}*</label>
                            <input type="text" id="date_affectation" name="date_affectation" class="form-control date" value="{{ old('date_affectation', isset($affectation) ? $affectation->date_affectation : '') }}" required>
                            @if($errors->has('date_affectation'))
                                <p class="help-block">
                                    {{ $errors->first('date_affectation') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.affectation.fields.date_affectation_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('date_depart') ? 'has-error' : '' }}">
                            <label for="date_depart">{{ trans('cruds.affectation.fields.date_depart') }}*</label>
                            <input type="text" id="date_depart" name="date_depart" class="form-control date" value="{{ old('date_depart', isset($affectation) ? $affectation->date_depart : '') }}" required>
                            @if($errors->has('date_depart'))
                                <p class="help-block">
                                    {{ $errors->first('date_depart') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.affectation.fields.date_depart_helper') }}
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