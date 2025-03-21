<?php

namespace App\Services;

use App\Models\Resource;
use App\Repositories\ResourceRepository;
use Illuminate\Database\Eloquent\Collection;

class ResourceService 
{
    protected $resourceRepository;

    public function __construct(ResourceRepository $resourceRepository)
    {
        $this->resourceRepository = $resourceRepository;
    }
    public function all(): Collection
    {
        return $this->resourceRepository->all();
    }
    public function create(array $data): Resource
    {
        return $this->resourceRepository->create($data);
    }
}