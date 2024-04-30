<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Models\Employee;
use App\Models\Trainee;

class UserController extends Controller
{

    private $userService;

    //definition du construteur
    public function __construct(UserService $userService)
    {
        $this -> userService = $userService;
    }

    //Fonction pour la creation d'un nouvel utilisateur
    public function RegisterUser(Request $request)
    {

        //validation des donnees
        $validData = $request -> validate([
            'firstname' => 'required |string',
            'lastname' =>  'required |string',
            'username' => 'required |string',
            'email' => 'required |string',
            'gender' => 'required ',
            'role' => 'required |string'
            // ['required',
            //     Rule::in(['employee', 'trainee'])]
        ]);

        //condition pour verifier si l'utilisateur n'existe pas deja
        if($this -> User_exist(User::class, 'firstname', $request->firstname, 'lastname', $request->lastname, 'username',$request->username))
        {
            return response()->json ('Cet utilisateur esxite deja', 400);
        }

        else{
            //creation d'un nouvel utilsateur
            $user = $this -> userService ->createUser($validData);

            // Création d'un employé et association avec l'utilisateur
            // Vérifier la valeur de la colonne 'role'
            if ($user->role === 'employee') {
                // Création d'un employé et association avec l'utilisateur
                $employee = new Employee();
                $employee->user_id = $user->id;
                $employee->save();
            } elseif ($user->role === 'trainee') {
                // Création d'un stagiaire et association avec l'utilisateur
                $trainee = new Trainee();
                $trainee->user_id = $user->id;
                $trainee->save();
            }
            //attribution d'un role
            // $user -> assignRole($validData['role']);
        }

        return response()->json ($user, 201);
    }



    //Fonction pour verifier l'existence d'un utilisateur
    public function User_exist($user,$field, $value, $field1,$value1,$field2,$value2)
    {
        return $user::where($field, $value)
        ->where($field1, $value1)
        ->where($field2,$value2)
        ->exists();
    }


    //Fonction de mise a jour d'un user
    public function UpdateUser(Request $request, $id)
    {

        $validData = $request -> validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string',
        ]);

        //Mise a jour de l'utoilisateur
        $user = $this -> userService ->updateUser($validData,$id);

        return response()->json ($user,200);
    }

    //Fonction de suppression d'un user
    public function DeleteUser($id)
    {
        $this -> userService -> deleteUser($id);

        return response()->json ('Utilsateur supprime avec succes',200);
    }

    //rechercher un  user
    public function FindUser($id)
    {
        //recuperation de l'utilisateur
        $user = $this -> userService -> findUser($id);

        return response()->json ($user,200);
    }

    //Liste des utilisateurs
    public function GetAllUser()
    {
        //recuperer les utilisateurs
        $user = $this -> userService -> getAllUser();

        return response()->json($user,200);
    }

}
