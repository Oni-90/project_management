<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Models\Project;
use App\Models\User;
// use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    private $projectService;

    //definition du constructeur
    public function __construct(ProjectService $projectService)
    {
        $this -> projectService = $projectService;
    }

    //creation d'un nouveau projet

    public function CreateProject(Request $request)
    {
        //validation du formulaire
        $validData = $request -> validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required |string',
            'description' => 'required |string',
            'start_date' => 'required | date',
            'end_date' => 'required |date',
            'status' => 'required |boolean',
        ]);

        //recuperer l'id de l'utisateur connecter et
        // $userId = Auth::id();
        //ajouter l'id recuperer au donne valide
        //$validData['user_id'] = $userId;

        //condition pour verifier l'existence d'un utilisateur
        $user = User::find($request->user_id);
        if(!$user)
        {
            return response() -> json ('Utilisateur non existant',400);
        }

        //condition pour verifier l'existence d'un projet
        if($this-> Project_exist(Project::class, 'name', $request->name))
        {
            return response() -> json ('Projet deja existant',400);
        }

        else{
            //creation d'un nouveua projet
            $project = $this -> projectService -> createProject($validData);
        }

        return response()->json ($project,201);


    }

    //fonction pour verifier l'existence d'un projet
    public function Project_exist($project, $field,$value)
    {
        return $project::where($field,$value)
        ->exists();
    }

    //Fonction de mise a jour d'un projet
    public function UpdateProject(Request $request,$id)
    {
        //validation du form
        $validData = $request -> validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required |string',
            'description' => 'required |string',
            'start_date' => 'required | date',
            'end_date' => 'required |date',
            'status' => 'required |boolean',

        ]);

        //mise a jour du projet
        $project = $this -> projectService -> updateProject($validData,$id);

        return response()->json ($project,200);
    }

    //fonction de suppression d'un projet
    public function DeleteProject($id)
    {
        $this -> projectService -> deleteProject($id);

        return response()->json('projet supprimer avec succes',200);
    }

    //Liste des projet
    public function GetAllProject()
    {
        //recupertion des projets
        $project =$this -> projectService -> getAllProject();

        return response()->json($project,200);
    }
}
