<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    protected $empRepo;

    public function __construct(EmployeeInterface $employee)
    {
        $this->empRepo = $employee;
    }

    public function index()
    {
        return $this->empRepo->getAll();
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'address'  => 'required',
        ]);

        $this->empRepo->create($request->all());
        return response()->json('successfully added!');
    }


    public function show(Employee $employee)
    {
        //
    }


    public function edit($id)
    {
        return Employee::find($id);
    }


    public function update($id, Request $request)
    {
        $this->empRepo->update($id, $request->all());

        return response()->json('successfully updated');
    }


    public function destroy($id)
    {
        $this->empRepo->delete($id);

        return response()->json('successfully deleted');
    }
}
