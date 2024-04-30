import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable, tap } from 'rxjs';
import { User } from '../Models/user';


@Injectable({
  providedIn: 'root'
})
export class UserService {
  private apiUrl = 'http://127.0.0.1:8000/api/users';


  constructor(private http: HttpClient) {  }
  //methode pour avpoir la liste des user
  getAllUser(): Observable<User[]>{
    const url = `${this.apiUrl}/get_all_user`;
    return this.http.get<User[]>(url)
  }
  //methode de creation d'un utilisateur
  registerUser(user:User): Observable<User>{
    const url = `${this.apiUrl}/register_user`;
    return this.http.post<User>(url,user);
  }

  //methode de connexion
  // loginUser(credentials: {email:string, password:string}): Observable<any>{
  //   return this.http.post<any>(`${this.apiUrl}/login_user`,credentials).pipe(
  //     tap(response => {
  //       //sauvegard du token d'authentification
  //       localStorage.setItem('token',response.token);
  //     })
  //   );
  // }

  //methode de mise a jour d'un suer
  updateUser(id:number, user: User): Observable<User>{
    const url = `${this.apiUrl}/update_user/${id}`;
    return this.http.put<User>(url,user);
  }

  //methode de suppression
  deleteUser(id:number): Observable<void>{
    const url =`${this.apiUrl}/delete_user/${id}`;
    return this.http.delete<void>(url);
  }

  //recherche d'un user
  findUser(id:number): Observable<User>{
    const url = `${this.apiUrl}/find_user/${id}`;
    return this.http.get<User>(url);
  }
}
