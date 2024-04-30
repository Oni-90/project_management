import { Component } from '@angular/core';
import { Project } from 'src/app/Models/project';
import { User } from 'src/app/Models/user';
import { ProjectService } from 'src/app/Services/project.service';
import { UserService } from 'src/app/Services/user.service';

@Component({
  selector: 'app-project',
  templateUrl: './project.component.html',
  styleUrls: ['./project.component.css']
})
export class ProjectComponent {

  page: String ='list';
  projects: Project[]=[];
  newProject: Project = new Project();
  projectSelect: Project | null = null;
  users: User[] = [];

  constructor(private projectService: ProjectService, private userService: UserService){ }


  ngOnInit() {
    this.getAllProject();
    this.getAllUser();
  }

  getAllUser(){
    this.userService.getAllUser().subscribe(
      (response: User[]) => {
        this.users = response;
      },
      (error) =>{
        console.log(error);
      }
    )
  }


  getAllProject(){
    this.projectService.getAllProject().subscribe(
      (response: Project[])=>{
        this.projects = response;
      },
      (error)=> {
        console.log(error);
      }
    );

  }

  pageCreate(){
    this.page='create';
  }

  //ajout d'un projet
  createProject(){
    this.projectService.createProject(this.newProject).subscribe(
      (response:Project) => {
        this.projects.push(response);
        this.newProject = new Project();
      },
      (error)=> {
        console.log(error);
      }
    );
    this.page="list";
  }

  pageUpdate(project:Project){
    this.projectSelect = project;
    this.page='update';
  }

  selectProject(project:Project){
    this.projectSelect = project;
  }

  updateProject(id:number, project:Project){
   if(this.projectSelect){
    this.projectService.updatePrpject(id,project).subscribe(
      (response:Project)=> {
        const index = this.projects.findIndex(project=>project.id===response.id);
        if(index!==-1){
          this.projects[index] = response;
        }
        this. projectSelect = null;
      },

      (error)=>{
        console.log(error);
      }

    );
   }
   this.page="list";
  }

  pageDelete(){
    this.page='delete'
  }
  //suppression d'un projet
  deleteProject(id:number){
    this.projectService.deleteProject(id).subscribe(
      ()=>{
        this.projects = this.projects.filter(project => project.id !==id);
      },

      (error)=>{
        console.log(error);
      }
    )
    this.page="list";
  }

  goBack(){
    this.page= 'list';
  }

}
