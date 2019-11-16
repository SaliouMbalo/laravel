<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Agence;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAgenceRequest;
use App\Http\Requests\UpdateAgenceRequest;
use App\Http\Resources\Admin\AgenceResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AgenceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('agence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgenceResource(Agence::all());
    }

    public function store(StoreAgenceRequest $request)
    {
        $agence = Agence::create($request->all());

        return (new AgenceResource($agence))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Agence $agence)
    {
        abort_if(Gate::denies('agence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AgenceResource($agence);
    }

    public function update(UpdateAgenceRequest $request, Agence $agence)
    {
        $agence->update($request->all());

        return (new AgenceResource($agence))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Agence $agence)
    {
        abort_if(Gate::denies('agence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agence->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
