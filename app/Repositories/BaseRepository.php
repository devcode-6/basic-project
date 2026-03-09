<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository {
    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function all(){
        return $this->model->paginate(10);
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function create(array $validatedData) {
        return $this->model->create($validatedData);
    }

    public function update($id, array $validatedData){
        $data = $this->model->findOrFail($id);
        return $data->update($validatedData);
    }

    public function delete($id) {
        $data = $this->model->findOrFail($id);
        return $data->delete();
    }

    public function show($id){
        return $this->model->findOrFail($id);
    }
}
