import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AdminComponent } from './admin/admin.component';
import { LoginComponent } from './login/login.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { ListeParComponent } from './liste-par/liste-par.component';
import { SuperComponent } from './super/super.component';

const routes: Routes = [
{path:'admin',component:AdminComponent },
{path :'listeAdmin',component:AdminComponent},
{path:'super',component:SuperComponent },
{path :'listePar',component:ListeParComponent},
{path :'login',component:LoginComponent},
{path:'',component:LoginComponent},
{path:'not-found',component:NotfoundComponent},
{path :'**',redirectTo:'/not-found'}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
  
})
export class AppRoutingModule { }
