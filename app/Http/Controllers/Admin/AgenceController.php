<?php

namespace App\Http\Controllers\Admin;

use App\Agence;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAgenceRequest;
use App\Http\Requests\StoreAgenceRequest;
use App\Http\Requests\UpdateAgenceRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgenceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agences = Agence::all();

        return view('admin.agences.index', compact('agences'));
    }

    public function create()
    {
        abort_if(Gate::denies('agence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agences.create');
    }

    public function store(StoreAgenceRequest $request)
    {
        $agence = Agence::create($request->all());

        return redirect()->route('admin.agences.index');
    }

    public function edit(Agence $agence)
    {
        abort_if(Gate::denies('agence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agences.edit', compact('agence'));
    }

    public function update(UpdateAgenceRequest $request, Agence $agence)
    {
        $agence->update($request->all());

        return redirect()->route('admin.agences.index');
    }

    public function show(Agence $agence)
    {
        abort_if(Gate::denies('agence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agences.show', compact('agence'));
    }

    public function destroy(Agence $agence)
    {
        abort_if(Gate::denies('agence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agence->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgenceRequest $request)
    {
        Agence::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
