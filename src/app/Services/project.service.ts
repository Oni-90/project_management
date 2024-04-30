import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';
import { Project } from '../Models/project';

@Injectable({
  providedIn: 'root'
})
export class ProjectService {
  private apiUrl = 'http://127.0.0.1:8000/api/projects';

  //definition du construct
  constructor(private http: HttpClient) { }

 //methode pour avoir la liste des projets
  getAllProject(): Observable<Project[]>{
    const url = `${this.apiUrl}/get_all_project`;
    return this.http.get<Project[]>(url);
  }


  //methode de creation d'un projet
  createProject(project: Project): Observable<Project>{
    const url = `${this.apiUrl}/create_project`;
    return this.http.post<Project>(url,project);
  }


  //methode de mise a jour d'un projet
  updatePrpject(id:number, project: Project): Observable<Project>{
    const url = `${this.apiUrl}/update_project/${id}`;
    return this.http.put<Project>(url, project);
  }

  //methode de supprssion d'un projet
  deleteProject(id:number): Observable<void>{
    const url = `${this.apiUrl}/delete_project/${id}`;
    return this.http.delete<void>(url);
  }

}
