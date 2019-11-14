import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import{FormsModule, ReactiveFormsModule} from '@angular/forms';
import { HttpClientModule,  } from '@angular/common/http';
import {Routes,RouterModule } from '@angular/router';
import { AppRoutingModule } from './app-routing.module';
import {AuthService} from './service/auth.service'
import {SuperService} from './service/super.service'
import { AppComponent } from './app.component';
import { LoginComponent } from './login/login.component';
import { from } from 'rxjs';
import { SuperComponent } from './super/super.component';
import { AdminComponent } from './admin/admin.component';
import { CaissierComponent } from './caissier/caissier.component';
import { UserComponent } from './user/user.component';
import { NotfoundComponent } from './notfound/notfound.component';
import { ListeParComponent } from './liste-par/liste-par.component';

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    SuperComponent,
    AdminComponent,
    CaissierComponent,
    UserComponent,
    NotfoundComponent,
    ListeParComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    RouterModule,
    FormsModule,
  ReactiveFormsModule,
  HttpClientModule,
  HttpClientModule,
  ],
  exports: [RouterModule],
  providers: [
    AuthService,SuperService],
  bootstrap: [AppComponent]
})
export class AppModule { }
