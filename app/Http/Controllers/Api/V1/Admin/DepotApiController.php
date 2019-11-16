<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Depot;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDepotRequest;
use App\Http\Requests\UpdateDepotRequest;
use App\Http\Resources\Admin\DepotResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepotApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('depot_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DepotResource(Depot::with(['telephones', 'numero_comptes'])->get());
    }

    public function store(StoreDepotRequest $request)
    {
        $depot = Depot::create($request->all());
        $depot->telephones()->sync($request->input('telephones', []));
        $depot->numero_comptes()->sync($request->input('numero_comptes', []));

        return (new DepotResource($depot))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Depot $depot)
    {
        abort_if(Gate::denies('depot_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new DepotResource($depot->load(['telephones', 'numero_comptes']));
    }

    public function update(UpdateDepotRequest $request, Depot $depot)
    {
        $depot->update($request->all());
        $depot->telephones()->sync($request->input('telephones', []));
        $depot->numero_comptes()->sync($request->input('numero_comptes', []));

        return (new DepotResource($depot))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Depot $depot)
    {
        abort_if(Gate::denies('depot_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depot->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
