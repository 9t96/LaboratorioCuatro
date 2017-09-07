import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-adivina-el-numero',
  templateUrl: './adivina-el-numero.component.html',
  styleUrls: ['./adivina-el-numero.component.css'],
  styles: [ 'h1{color:red} p{color: #021751}']
})
export class AdivinaElNumeroComponent implements OnInit {
  miResultado:string;
  userNumber:number;
  miNumero:number;
  
  constructor() { 
      this.miResultado = "Esperando numero...";
      this.userNumber = 0;
      this.miNumero= Math.floor(Math.random() * 99 + 1);
  }
  
  verificarNumero()
  {   
    if(this.miNumero == this.userNumber)
     this.miResultado = "Felicitaciones ha acertado el numero";
    else
     this.miResultado = "Vuelva a intentarlo.";
  }

  NuevoNumero()
  {
    this.miNumero = Math.floor(Math.random() * 99 + 1);
    this.miResultado = "Esperando numero....";
  }

  
  ngOnInit() {
  
  }

}
