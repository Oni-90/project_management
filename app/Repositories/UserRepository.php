<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Base\BaseRepository;


/**
 * @Extend the Base class BaseRepository
 */
class UserRepository extends BaseRepository
{
    /**
     * TestRepository constructor.
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    //Methode de creation d'un utilsateur et par extension celui d'un employee ou d'un stagiare
    public function createUser(array $data)
    {
        return $this-> model -> create($data);
    }

    //Methoide de mise a jour d'un user
    public function updateUser(array $data, $id)
    {
        return $this -> model:: where('id', $id) -> update($data);
    }

    //Methode de suppression d'un user
    public function deleteUser($id)
    {
        return $this -> model -> destroy($id);
    }

    //Methode por obtenir la liste des users
    public function getAllUser()
    {
        return $this -> model -> all();
    }

    //Methode de recherche d'un user
    public function findUser($id)
    {
        return $this -> model -> find($id);
    }






}
