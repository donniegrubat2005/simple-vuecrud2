<?php

namespace App\Repositories;

interface EmployeeInterface {

    public function getAll();
    public function create(array $attributes);
    public function update($id, array $attributes);
    public function delete($id);
}