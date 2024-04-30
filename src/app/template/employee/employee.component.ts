import { Component, OnInit  } from '@angular/core';
import { Employee } from 'src/app/Models/employee';
import { EmployeeService } from 'src/app/Services/employee.service';

@Component({
  selector: 'app-employee',
  templateUrl: './employee.component.html',
  styleUrls: ['./employee.component.css']
})
export class EmployeeComponent implements OnInit {
  employee: Employee[] = [];
  employeeSelect: Employee |undefined;

  constructor(private employeeService: EmployeeService){ }

  ngOnInit(){
    this.getAllEmployee();
  }

  getAllEmployee(){
    this.employeeService.getAllEmployee().subscribe(
      (response: Employee[]) =>{
        this.employee = response;
        console.log("employee",this.employee)
      },
      (error)=>{
        console.log(error);
      }
    );
  }

  findEmployee(id: number): void {
    this.employeeService.findEmployee(id).subscribe(
      (employee: Employee) => {
        this.employeeSelect = employee;
        // Faites quelque chose avec l'employé trouvé
      },
      (error: any) => {
        // Gérer les erreurs ici
        console.error(error);
      }
    );
  }


}
