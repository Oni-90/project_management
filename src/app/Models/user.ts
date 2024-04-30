export class User {
  id !:number;
  firstname : String;
  lastname : String;
  username : String;
  email : String;
  gender : String;
  role : String;

  //definition d'un constructeur
  constructor(){
    this.firstname = "";
    this.lastname = "";
    this.username = "";
    this.email ="";
    this.gender = "";
    this.role = "";


  }

}
