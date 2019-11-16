<?php

namespace App\Http\Controllers\Admin;

use App\Affectation;
use App\Agence;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAffectationRequest;
use App\Http\Requests\StoreAffectationRequest;
use App\Http\Requests\UpdateAffectationRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AffectationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('affectation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affectations = Affectation::all();

        return view('admin.affectations.index', compact('affectations'));
    }

    public function create()
    {
        abort_if(Gate::denies('affectation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $agences = Agence::all()->pluck('nom', 'id');

        return view('admin.affectations.create', compact('users', 'agences'));
    }

    public function store(StoreAffectationRequest $request)
    {
        $affectation = Affectation::create($request->all());
        $affectation->users()->sync($request->input('users', []));
        $affectation->agences()->sync($request->input('agences', []));

        return redirect()->route('admin.affectations.index');
    }

    public function edit(Affectation $affectation)
    {
        abort_if(Gate::denies('affectation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id');

        $agences = Agence::all()->pluck('nom', 'id');

        $affectation->load('users', 'agences');

        return view('admin.affectations.edit', compact('users', 'agences', 'affectation'));
    }

    public function update(UpdateAffectationRequest $request, Affectation $affectation)
    {
        $affectation->update($request->all());
        $affectation->users()->sync($request->input('users', []));
        $affectation->agences()->sync($request->input('agences', []));

        return redirect()->route('admin.affectations.index');
    }

    public function show(Affectation $affectation)
    {
        abort_if(Gate::denies('affectation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affectation->load('users', 'agences');

        return view('admin.affectations.show', compact('affectation'));
    }

    public function destroy(Affectation $affectation)
    {
        abort_if(Gate::denies('affectation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affectation->delete();

        return back();
    }

    public function massDestroy(MassDestroyAffectationRequest $request)
    {
        Affectation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
