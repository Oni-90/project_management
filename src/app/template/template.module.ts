import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { TemplateRoutingModule } from './template-routing.module';
import { TemplateComponent } from './template.component';
import { HeaderComponent } from './header/header.component';
import { FooterComponent } from './footer/footer.component';
import { SideBarComponent } from './side-bar/side-bar.component';
import { TraineeComponent } from './trainee/trainee.component';
import { HttpClientModule } from '@angular/common/http';
import { EmployeeComponent } from './employee/employee.component';
import { ProjectComponent } from './project/project.component';
import { UserComponent } from './user/user.component';
import { DashboardComponent } from './dashboard/dashboard.component';
import { FormsModule } from '@angular/forms';



@NgModule({
  declarations: [
    TemplateComponent,
    HeaderComponent,
    FooterComponent,
    SideBarComponent,
    TraineeComponent,
    EmployeeComponent,
    ProjectComponent,
    UserComponent,
    DashboardComponent
  ],
  imports: [
    CommonModule,
    TemplateRoutingModule,
    HttpClientModule,
    FormsModule,

  ]
})
export class TemplateModule { }
