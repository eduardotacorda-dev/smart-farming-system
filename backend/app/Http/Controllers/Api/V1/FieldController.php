<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreFieldRequest;
use App\Http\Requests\Api\V1\UpdateFieldRequest;
use App\Http\Resources\FieldResource;
use App\Models\Farm;
use App\Models\Field;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class FieldController extends Controller
{
    public function index(Farm $farm): mixed
    {
        Gate::authorize('view', $farm);

        return FieldResource::collection($farm->fields()->withCount('zones')->latest()->get());
    }

    public function store(StoreFieldRequest $request, Farm $farm): JsonResponse
    {
        Gate::authorize('view', $farm);

        $field = $farm->fields()->create($request->validated());

        return FieldResource::make($field)->response()->setStatusCode(201);
    }

    public function show(Field $field): FieldResource
    {
        Gate::authorize('view', $field);

        return FieldResource::make($field->loadCount('zones'));
    }

    public function update(UpdateFieldRequest $request, Field $field): FieldResource
    {
        Gate::authorize('update', $field);
        $field->update($request->validated());

        return FieldResource::make($field->refresh()->loadCount('zones'));
    }
}
