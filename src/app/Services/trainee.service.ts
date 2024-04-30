import { Injectable } from '@angular/core';
import { UserService } from './user.service';
import { Observable } from 'rxjs';
import { Trainee } from '../Models/trainee';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class TraineeService {
  private apiUrl = 'http://127.0.0.1:8000/api/trainees';


  constructor(private userService: UserService, private http:HttpClient) { }

  getAllTrainee(): Observable<Trainee[]>{
    const url =`${this.apiUrl}/get_all_trainee`
    return this.http.get<Trainee[]>(url);
  }

  findTrainee(id:number): Observable<Trainee>{
    return this.userService.findUser(id) as Observable<Trainee>;
  }
}
