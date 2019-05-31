<?php

namespace App\Repositories;

use App\Employee;

class EmployeeRepository implements EmployeeInterface {

    protected $empRepo;

    public function __construct(Employee $employee)
    {
      $this->empRepo = $employee;
    }

    public function getAll()
    {
        return $this->empRepo->all();
    }

    public function create(array $attributes)
    {
        return $this->empRepo->create($attributes);
    }

    public function update($id, array $attributes)
    {
        return $this->empRepo->findOrFail($id)->update($attributes);
    }

    public function delete($id)
    {
       return $this->empRepo->destroy($id);
    }

}