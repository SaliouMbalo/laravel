<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Compte;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompteRequest;
use App\Http\Requests\UpdateCompteRequest;
use App\Http\Resources\Admin\CompteResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompteApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('compte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompteResource(Compte::with(['code', 'telephones'])->get());
    }

    public function store(StoreCompteRequest $request)
    {
        $compte = Compte::create($request->all());
        $compte->telephones()->sync($request->input('telephones', []));

        return (new CompteResource($compte))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Compte $compte)
    {
        abort_if(Gate::denies('compte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompteResource($compte->load(['code', 'telephones']));
    }

    public function update(UpdateCompteRequest $request, Compte $compte)
    {
        $compte->update($request->all());
        $compte->telephones()->sync($request->input('telephones', []));

        return (new CompteResource($compte))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Compte $compte)
    {
        abort_if(Gate::denies('compte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $compte->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
