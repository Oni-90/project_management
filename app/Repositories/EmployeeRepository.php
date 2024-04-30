<?php

namespace App\Repositories;

use App\Models\Employee;
use App\Models\User;
use App\Repositories\Base\BaseRepository;

class EmployeeRepository extends UserRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
    //Methode d'obtention de la liste des employes
    public function getAllEmployee()
    {
        return $this -> model -> all();
    }

}
