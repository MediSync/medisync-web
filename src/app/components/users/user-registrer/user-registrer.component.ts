import { Component, OnInit } from '@angular/core';
import { UsersService } from 'src/app/services/users.service';
import { NgForm } from '@angular/forms';
import { AngularFirestore } from '@angular/fire/firestore';

@Component({
  selector: 'app-user-registrer',
  templateUrl: './user-registrer.component.html',
  styleUrls: ['./user-registrer.component.css']
})
export class UserRegistrerComponent implements OnInit {

  constructor(public service: UsersService,
    private firestore: AngularFirestore) { }

  ngOnInit() {
    this.resetForm();
  }

  resetForm(form?: NgForm) {
    if (form != null)
      form.resetForm();
    this.service.FormData = {
      id: null,
      rut: '',
      names: '',
      last_name1: '',
      last_name2: '',
      phone: '',
      email: '',
      password: ''
    }
  }
}
