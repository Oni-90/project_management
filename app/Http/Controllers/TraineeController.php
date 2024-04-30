<?php

namespace App\Http\Controllers;

use App\Services\TraineeService;
use Illuminate\Http\Request;

class TraineeController extends UserController
{
    private $traineeService;

    //Definition du contructeur
    public function __construct(TraineeService $traineeService)
    {
        parent::__construct($traineeService); //appel du contructeur
        $this -> traineeService = $traineeService;

    }

    //fontion pouravoir la liste des stagiaires
    public function GetAllTrainee()
    {
        //recupration des stagiaires
        $trainee = $this -> traineeService -> getAllTrainee();

        return response()->json($trainee,200);
    }
}
