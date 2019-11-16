<?php

namespace App\Http\Controllers\Admin;

use App\Agence;
use App\Client;
use App\Compte;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCompteRequest;
use App\Http\Requests\StoreCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompteController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('compte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comptes = Compte::all();

        return view('admin.comptes.index', compact('comptes'));
    }

    public function create()
    {
        abort_if(Gate::denies('compte_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codes = Agence::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $telephones = Client::all()->pluck('telephone', 'id');

        return view('admin.comptes.create', compact('codes', 'telephones'));
    }

    public function store(StoreCompteRequest $request)
    {
        $compte = Compte::create($request->all());
        $compte->telephones()->sync($request->input('telephones', []));

        return redirect()->route('admin.comptes.index');
    }

    public function edit(Compte $compte)
    {
        abort_if(Gate::denies('compte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $codes = Agence::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $telephones = Client::all()->pluck('telephone', 'id');

        $compte->load('code', 'telephones');

        return view('admin.comptes.edit', compact('codes', 'telephones', 'compte'));
    }

    public function update(UpdateCompteRequest $request, Compte $compte)
    {
        $compte->update($request->all());
        $compte->telephones()->sync($request->input('telephones', []));

        return redirect()->route('admin.comptes.index');
    }

    public function show(Compte $compte)
    {
        abort_if(Gate::denies('compte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compte->load('code', 'telephones');

        return view('admin.comptes.show', compact('compte'));
    }

    public function destroy(Compte $compte)
    {
        abort_if(Gate::denies('compte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compte->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompteRequest $request)
    {
        Compte::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
