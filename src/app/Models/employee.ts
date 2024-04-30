import { User } from "./user";

export class Employee extends User{
  override id !: number;
  user_id !: number;
  constructor(){

    super();//appel du constructeur de User
  }
}
