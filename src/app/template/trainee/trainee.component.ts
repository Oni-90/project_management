import { Component, OnInit} from '@angular/core';
import { Trainee } from 'src/app/Models/trainee';
import { TraineeService } from 'src/app/Services/trainee.service';

@Component({
  selector: 'app-trainee',
  templateUrl: './trainee.component.html',
  styleUrls: ['./trainee.component.css']
})
export class TraineeComponent implements OnInit {
  trainee: Trainee[] =[];
  traineeSelect: Trainee | undefined;

  constructor(private traineeService:TraineeService){ }

  ngOnInit(){
    this.getAllTrainee();
  }

  getAllTrainee(){
    this.traineeService.getAllTrainee().subscribe(
      (response: Trainee[]) => {
        this.trainee = response;
      },
      (error)=>{
        console.log(error);
      }
    );
  }

  //methode de recherche d'un stagiaire
  findTrainee(id:number):void{
    this.traineeService.findTrainee(id).subscribe(
      (trainee:Trainee) =>{
        this.traineeSelect = trainee;
      },
      (error)=>{
        console.log(error);
      }
    )
  }

}
