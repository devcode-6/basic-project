<?php

namespace App\Repositories;

use App\Models\Department;

class DepartmentRepository
{
    public function all()
    {
        return Department::paginate(10);
    }

    public function find($id)
    {
        return Department::findOrFail($id);
    }

    public function create(array $data)
    {
        return Department::create($data);
    }

    public function update($id, array $data)
    {
        $department = Department::findOrFail($id);
        $department->update($data);

        return $department;
    }

    public function delete($id)
    {
        $department = Department::findOrFail($id);
        return $department->delete();
    }
}
