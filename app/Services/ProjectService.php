<?php
namespace App\Services;

use App\Repositories\ProjectRepository;


class ProjectService
{
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this -> projectRepository = $projectRepository ;
    }


    //implementation de la methode createProject du repo
    public function createProject(array $data)
    {
        return $this -> projectRepository -> create($data);
    }

    //implementation de la methode updateProject du repo
    public function updateProject(array $data,$id)
    {
        return $this -> projectRepository -> update($data,$id);
    }

    //implementation de la methode deleteProject
    public function deleteProject($id)
    {
        return $this -> projectRepository -> delete($id);
    }

    //implementation de la methode getAllProject
    public function getAllProject()
    {
        return $this -> projectRepository -> all();
    }



}
