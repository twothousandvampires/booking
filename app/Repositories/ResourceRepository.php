<?php

namespace App\Repositories;

use App\Models\Resource;
use Illuminate\Database\Eloquent\Collection;

class ResourceRepository
{
    protected $model;

    public function __construct(Resource $resource)
    {
        $this->model = $resource;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function create(array $data): Resource
    {
        return $this->model->create($data);
    }

    public function find($id): Resource
    {
        return $this->model->findOrFail($id);
    }
}