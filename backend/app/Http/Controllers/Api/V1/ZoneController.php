<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreZoneRequest;
use App\Http\Requests\Api\V1\UpdateZoneRequest;
use App\Http\Resources\ZoneResource;
use App\Models\Field;
use App\Models\Zone;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class ZoneController extends Controller
{
    public function index(Field $field): mixed
    {
        Gate::authorize('view', $field);

        return ZoneResource::collection($field->zones()->latest()->get());
    }

    public function store(StoreZoneRequest $request, Field $field): JsonResponse
    {
        Gate::authorize('view', $field);

        $zone = $field->zones()->create($request->validated());

        return ZoneResource::make($zone)->response()->setStatusCode(201);
    }

    public function show(Zone $zone): ZoneResource
    {
        Gate::authorize('view', $zone);

        return ZoneResource::make($zone);
    }

    public function update(UpdateZoneRequest $request, Zone $zone): ZoneResource
    {
        Gate::authorize('update', $zone);
        $zone->update($request->validated());

        return ZoneResource::make($zone->refresh());
    }
}
