import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import {FormsModule} from '@angular/forms';
import { AppComponent } from './app.component';
import { NewComponenteComponent } from './micomponente/new-componente/new-componente.component';
import { AdivinaElNumeroComponent } from './adivina-el-numero/adivina-el-numero.component';

@NgModule({
  declarations: [
    AppComponent,
    NewComponenteComponent,
    AdivinaElNumeroComponent
  ],
  imports: [
    BrowserModule,FormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
