<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreFarmRequest;
use App\Http\Requests\Api\V1\UpdateFarmRequest;
use App\Http\Resources\FarmResource;
use App\Models\Farm;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FarmController extends Controller
{
    public function index(Request $request): mixed
    {
        Gate::authorize('viewAny', Farm::class);

        return FarmResource::collection(
            $request->user()->farms()->withCount('fields')->latest()->get(),
        );
    }

    public function store(StoreFarmRequest $request): JsonResponse
    {
        Gate::authorize('create', Farm::class);

        $farm = $request->user()->farms()->create($request->validated());

        return FarmResource::make($farm)->response()->setStatusCode(201);
    }

    public function show(Farm $farm): FarmResource
    {
        Gate::authorize('view', $farm);

        return FarmResource::make($farm->loadCount('fields'));
    }

    public function update(UpdateFarmRequest $request, Farm $farm): FarmResource
    {
        Gate::authorize('update', $farm);
        $farm->update($request->validated());

        return FarmResource::make($farm->refresh()->loadCount('fields'));
    }
}
