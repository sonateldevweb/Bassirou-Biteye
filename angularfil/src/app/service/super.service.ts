import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http'

@Injectable({
  providedIn: 'root'
})
export class SuperService {
  private listePar = "http://localhost:8000/api/liste";

  constructor(private http: HttpClient) { }
  getListePar(){
    return this.http.get<any>(this.listePar)
  }
}
