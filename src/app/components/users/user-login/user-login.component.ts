import { Component, OnInit } from '@angular/core';
import { NgForm } from '@angular/forms';
import { AngularFirestore } from '@angular/fire/firestore';
import { UsersService } from 'src/app/services/users.service';

@Component({
  selector: 'app-user-login',
  templateUrl: './user-login.component.html',
  styleUrls: ['./user-login.component.css']
})
export class UserLoginComponent implements OnInit {

  constructor(public service: UsersService,
    private firestore: AngularFirestore) { }

  ngOnInit() {
  }

  login_profile: string;
  login_rut: string;
  login_pass: string;

  onSubmit() {
    alert(this.login_profile +" "+ this.login_rut + " " + this.login_pass);
  }

}
