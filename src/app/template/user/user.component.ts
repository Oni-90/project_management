import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { User } from 'src/app/Models/user';
import { UserService } from 'src/app/Services/user.service';


@Component({
  selector: 'app-user',
  templateUrl: './user.component.html',
  styleUrls: ['./user.component.css']
})
export class UserComponent implements OnInit {
  page: String ='list';
  users: User[]=[];
  newUSer: User = new User();
  userSelect: User | null = null;
  userToDelete: any;



  constructor(private userService: UserService, private router:Router) { }
  ngOnInit(): void {
    this.getAllUser();
    this.userService.getAllUser().subscribe(users => {
      this.users = users;
    });
  }


  getAllUser(){
    this.userService.getAllUser().subscribe(
      (response: User[]) =>{
        this.users = response;
      },
      (error) =>{
        console.log(error);
      }
    );
  }

  pageRegister(){
    this.page='register';
  }


  //creation d'un utilisateur
  registerUser(){
    this.userService.registerUser(this.newUSer).subscribe(
      (response: User) => {
        this.users.push(response);
        this.newUSer = new User();
      },
      (error) => {
        console.log(error);
      }
    );
    this.page='list';
  }



  //connexion d'un user
  // loginUSer(){
  //   this.userService.loginUser(this.credentials).subscribe(() =>{
  //   this.router.navigate(['/template']);
  //   },
  //   error =>{
  //     console.log('Erreur de connexion', error);
  //   }
  //   );
  // }

  pageUpdate(user:User){
    console.log("user update", user);
    this.findUser(user.id);
    this.page='update';
  }

  selectUser(user:User){
    this.userSelect = user;
  }

//Mise a jour d'un utilisateur
  updateUser(id:number,user:User){
    console.log("user_id", id);
    if(id) {
      this.userService.updateUser(id,user).subscribe(
        (response: User) => {
          console.log("user", response);
          const index = this.users.findIndex(user => user.id === response.id);
          if(index !== -1){
            this.users[index] = response;
          }
          this.getAllUser();
          this.userSelect = null;
        },
        (error) => {
          console.log(error);
        }

      );
    }
     this.page='list'
  }


  pageDelete(){
    this.page='delete';
  }
  //suppression d'un utilisateur
  deleteUser(id:number){
    this.userService.deleteUser(id).subscribe(
      ()=> {
        this.users = this.users.filter(user => user.id !== id )
      },
      (error) => {
        console.log(error);
      }
    )
    this.page='list'
  }

  goBack(){
    this.page= 'list';
  }

  //methode de recherche d'un utilisateur
  findUser(id:number):void{
    this.userService.findUser(id).subscribe(
      (user:User) =>{
        this.userSelect = user;
        console.log("find", user);
      },
      (error)=>{
        console.log(error);
      }
    );
  }
}
