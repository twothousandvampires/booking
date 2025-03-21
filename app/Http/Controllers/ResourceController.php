<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResourceRequest;
use App\Http\Resources\ResourceResource;
use App\Services\ResourceService;

class ResourceController extends Controller
{
    protected $resourceService;

    public function __construct(ResourceService $resourceService)
    {
        $this->resourceService = $resourceService;
    }

    public function index()
    {
        return ResourceResource::collection($this->resourceService->all());
    }
    
    public function store(StoreResourceRequest $request)
    {
        $resource = $this->resourceService->create($request->validated());
        return new ResourceResource($resource);
    }
}
