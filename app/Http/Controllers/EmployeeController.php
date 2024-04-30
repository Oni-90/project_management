<?php

namespace App\Http\Controllers;

use App\Services\EmployeeService;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends UserController
{
    private $employeeService;

    //Definition du constructeur
    public function __construct(EmployeeService $employeeService)
    {
        parent::__construct($employeeService); //appel du contructeur
        $this -> employeeService = $employeeService;
    }

    public function GetAllEmployee()
    {
        //recuperation des employes
        $employee = Employee::all();

        return response()->json($employee,200);
    }
}

