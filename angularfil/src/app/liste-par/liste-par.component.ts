import { Component, OnInit } from '@angular/core';
import { SuperService } from '../service/super.service';

@Component({
  selector: 'app-liste-par',
  templateUrl: './liste-par.component.html',
  styleUrls: ['./liste-par.component.css']
})
export class ListeParComponent implements OnInit {
  listePar = []
  constructor( private _superService :SuperService) { }

  ngOnInit() {
    this._superService.getListePar()
    .subscribe(
      res =>this.listePar =res,
      err => console.log(err)
    )
  }

}
