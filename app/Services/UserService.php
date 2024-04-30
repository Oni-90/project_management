<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    private $userRepository;

    #region Constructor
    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }
    #endregion

    //Implementation de la methode createUser
    public function createUser (array $data)
    {
        return $this  -> userRepository -> create($data);
    }

    //implementation de la methode updateUser
    public function updateUser(array $data,$id)
    {
        return $this -> userRepository -> update($data,$id);
    }

    //implementation de la methode deleteUser
    public function deleteUser($id)
    {
        return $this -> userRepository -> delete($id);
    }

    //implementation de la methode getAllUser
    public function getAllUser()
    {
        return $this -> userRepository -> all();
    }

    //implementation de la methode findUser
    public function findUser($id)
    {
        return $this -> userRepository -> find($id);
    }


}
