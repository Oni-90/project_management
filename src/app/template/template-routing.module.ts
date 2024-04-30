import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { TemplateComponent } from './template.component';
import { TraineeComponent } from './trainee/trainee.component';
import { EmployeeComponent } from './employee/employee.component';
import { ProjectComponent } from './project/project.component';
import { UserComponent } from './user/user.component';
import { DashboardComponent } from './dashboard/dashboard.component';

const routes: Routes = [{
  path: '', redirectTo: '',pathMatch: 'full',},{ path: '', component: TemplateComponent,
  children:[
    {path:'dashboard',component:DashboardComponent},
    {path:'trainee',component:TraineeComponent},
    {path:'employee', component:EmployeeComponent},
    {path:'project',component:ProjectComponent},
    {path:'user',component:UserComponent},
  ]
}];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class TemplateRoutingModule { }
