<?php

namespace App\Repositories;

use App\Models\Trainee;
use App\Models\User;
use App\Repositories\Base\BaseRepository;

class TraineeRepository extends UserRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getAllTrainee()
    {
        return $this -> model -> all();
    }

}
