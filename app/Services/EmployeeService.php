<?php

namespace App\Services;

use App\Repositories\EmployeeRepository;

class EmployeeService extends UserService
{
    private $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
       parent:: __construct($employeeRepository);
    }

     //implementation de la methode getAllEmployee du repo
    public function getAllEmployee()
    {
        return $this -> employeeRepository -> all();
    }
}
