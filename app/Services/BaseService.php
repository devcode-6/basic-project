<?php

namespace App\Services;

class BaseService {
    protected $repository;

    public function __construct($repository) {
        $this->repository = $repository;
    }

    public function all() {
        return $this->repository->all();
    }

    public function find($id) {
        return $this->repository->findOrFail($id);
    }

    public function create(array $validatedData) {
        return $this->repository->create($validatedData);
    }

    public function update($id, array $validatedData) {
        return $this->repository->update($id, $validatedData);
    }

    public function delete($id) {
        return $this->repository->delete($id);
    }

    public function show($id) {
        return $this->repository->show($id);
    }
}
