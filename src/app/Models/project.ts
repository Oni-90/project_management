export class Project {
  id !: number;
  user_id !: number;
  name : String;
  description : String;
  start_date : Date;
  end_date : Date;
  status : boolean;

  //definition du constructeur
  constructor(st_date: Date = new Date(), ed_date: Date = new Date() ){
    this.name = "";
    this.description = "";
    this.start_date = st_date;
    this.end_date = ed_date;
    this.status = false;
  }

}
