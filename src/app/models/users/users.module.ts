import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

@NgModule({
  declarations: [],
  imports: [
    CommonModule
  ]
})
export class UsersModule {
  id: string;
  rut: string;
  names: string;
  last_name1: string;
  last_name2: string;
  phone: string;
  email: string;
  password: string;
}
