import { Injectable } from '@angular/core';
import { UserService } from './user.service';
import { Observable } from 'rxjs';
import { Employee } from '../Models/employee';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class EmployeeService {
  private apiUrl = 'http://127.0.0.1:8000/api/employees';


  constructor(private userService: UserService, private http:HttpClient) { }

  getAllEmployee(): Observable<Employee[]>{
    const url = `${this.apiUrl}/get_all_employee`
    return this.http.get<Employee[]>(url);
  }

  findEmployee(id:number): Observable<Employee>{
    return this.userService.findUser(id) as Observable<Employee>;
  }
}
