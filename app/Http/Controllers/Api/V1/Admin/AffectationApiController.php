<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Affectation;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAffectationRequest;
use App\Http\Requests\UpdateAffectationRequest;
use App\Http\Resources\Admin\AffectationResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AffectationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('affectation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AffectationResource(Affectation::with(['users', 'agences'])->get());
    }

    public function store(StoreAffectationRequest $request)
    {
        $affectation = Affectation::create($request->all());
        $affectation->users()->sync($request->input('users', []));
        $affectation->agences()->sync($request->input('agences', []));

        return (new AffectationResource($affectation))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Affectation $affectation)
    {
        abort_if(Gate::denies('affectation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AffectationResource($affectation->load(['users', 'agences']));
    }

    public function update(UpdateAffectationRequest $request, Affectation $affectation)
    {
        $affectation->update($request->all());
        $affectation->users()->sync($request->input('users', []));
        $affectation->agences()->sync($request->input('agences', []));

        return (new AffectationResource($affectation))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Affectation $affectation)
    {
        abort_if(Gate::denies('affectation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $affectation->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
