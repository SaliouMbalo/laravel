<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Compte;
use App\Depot;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepotRequest;
use App\Http\Requests\StoreDepotRequest;
use App\Http\Requests\UpdateDepotRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepotController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('depot_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depots = Depot::all();

        return view('admin.depots.index', compact('depots'));
    }

    public function create()
    {
        abort_if(Gate::denies('depot_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $telephones = Client::all()->pluck('telephone', 'id');

        $numero_comptes = Compte::all()->pluck('numero', 'id');

        return view('admin.depots.create', compact('telephones', 'numero_comptes'));
    }

    public function store(StoreDepotRequest $request)
    {
        $depot = Depot::create($request->all());
        $depot->telephones()->sync($request->input('telephones', []));
        $depot->numero_comptes()->sync($request->input('numero_comptes', []));

        return redirect()->route('admin.depots.index');
    }

    public function edit(Depot $depot)
    {
        abort_if(Gate::denies('depot_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $telephones = Client::all()->pluck('telephone', 'id');

        $numero_comptes = Compte::all()->pluck('numero', 'id');

        $depot->load('telephones', 'numero_comptes');

        return view('admin.depots.edit', compact('telephones', 'numero_comptes', 'depot'));
    }

    public function update(UpdateDepotRequest $request, Depot $depot)
    {
        $depot->update($request->all());
        $depot->telephones()->sync($request->input('telephones', []));
        $depot->numero_comptes()->sync($request->input('numero_comptes', []));

        return redirect()->route('admin.depots.index');
    }

    public function show(Depot $depot)
    {
        abort_if(Gate::denies('depot_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depot->load('telephones', 'numero_comptes');

        return view('admin.depots.show', compact('depot'));
    }

    public function destroy(Depot $depot)
    {
        abort_if(Gate::denies('depot_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depot->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepotRequest $request)
    {
        Depot::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
