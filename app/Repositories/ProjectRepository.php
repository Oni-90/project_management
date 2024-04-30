<?php

namespace App\Repositories;

use App\Models\Project;

use App\Repositories\Base\BaseRepository;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $project)
    {
        parent::__construct($project);
    }

    //Methode de creation d'un projet
    public function createProject(array $data)
    {
        return $this -> model -> create($data);
    }

    //Methode de mise a jour d'un projet
    public function updateProject(array $data,$id)
    {
        $this -> model::where('id',$id)->update($data);
    }

    //Methde de suppression d'un projet
    public function deleteProject($id)
    {
        return $this -> model -> destroy($id);
    }

    //Methode pour obtenir la liste des projet
    public function getAllProject()
    {
        return $this -> model -> all();
    }


}
