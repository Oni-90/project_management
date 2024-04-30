import { User } from "./user";

export class Trainee extends User {
  override id !: number;
  user_id !: number;

  constructor(){
    super();//appel du constructeur de User

  }
}
