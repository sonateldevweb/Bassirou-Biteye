import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http'
import { Router } from '@angular/router'
@Injectable(
)
export class AuthService {

  private _registerUrl = "http://localhost:8000/api/register";
  private _loginUrl = "http://localhost:8000/api/login";

  constructor(private http: HttpClient,
              private _router: Router) { }

  registerUser(user) {
    return this.http.post<any>(this._registerUrl, user)
  }

  loginUser(user) {
    const headers = new HttpHeaders().set('Authorization','Bearer '+localStorage.getItem('token'));
    return this.http.post<any[]>(this._loginUrl, user,{headers:headers})
    
  }


  getToken() {
    return localStorage.getItem('token')
  }

  loggedIn() {
    return !!localStorage.getItem('token')    
  }
}
