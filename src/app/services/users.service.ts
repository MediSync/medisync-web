import { Injectable } from '@angular/core';
import { UsersModule } from '../models/users/users.module';
import { AngularFirestore } from '@angular/fire/firestore';

@Injectable({
  providedIn: 'root'
})
export class UsersService {
  FormData: UsersModule;

  constructor(private firestore: AngularFirestore) { }

  getUsers(){
    return this.firestore.collection('users').snapshotChanges();
  }
}
