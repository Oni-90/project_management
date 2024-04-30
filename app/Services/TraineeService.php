<?php

namespace App\Services;

use App\Repositories\TraineeRepository;

class TraineeService extends UserService
{
    private $traineeRepository;

    public function __construct(TraineeRepository $traineeRepository)
    {
       parent:: __construct($traineeRepository);
    }

    //implementation de la methode getAllTrainee du repo
    public function getAllTrainee()
    {
        return $this -> traineeRepository -> all();
    }
}
