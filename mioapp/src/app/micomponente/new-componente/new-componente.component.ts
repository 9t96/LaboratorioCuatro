import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-new-componente',
  templateUrl: './new-componente.component.html',
  styleUrls: ['./new-componente.component.css']
})
export class NewComponenteComponent implements OnInit {

  constructor() { }

  miVar = "Este es mi titulo!:!";

  MisHeroes:any = [{nombre : 'Windstorm',villano: false},
                {nombre:'Guason', villano:true},
                {nombre:'spiderman',villano:false},
                {nombre:'Batman',villano:false},
                {nombre:'IronMan',villano:false},
                {nombre:'Hulk',villano:true},
                {nombre:'Arrow',villano:false},
                {nombre:'LinternaVerde',villano:false},
                {nombre:'deadpool',villano:true},
                {nombre:'Messi',villano:false}];


  ngOnInit() {
  }

}
