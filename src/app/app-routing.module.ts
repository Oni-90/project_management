import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { TemplateComponent } from './template/template.component';

const routes: Routes = [{
  path: '', redirectTo: '', pathMatch: 'full'}, { path: '', loadChildren: () => import('./template/template.module').then(m => m.TemplateModule) },];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
