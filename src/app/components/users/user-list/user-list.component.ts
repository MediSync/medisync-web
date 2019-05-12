import { Component, OnInit } from '@angular/core';
import { UsersService } from 'src/app/services/users.service';
import { UsersModule } from 'src/app/models/users/users.module';
import { AngularFirestore } from '@angular/fire/firestore';

@Component({
  selector: 'app-user-list',
  templateUrl: './user-list.component.html',
  styleUrls: ['./user-list.component.css']
})
export class UserListComponent implements OnInit {

  list: UsersModule[];
  constructor(private service: UsersService,
    private firestore: AngularFirestore) { }

  ngOnInit() {
    this.service.getUsers().subscribe(actionArray => {
      this.list = actionArray.map(item => {
        return {
          id: item.payload.doc.id,
          ...item.payload.doc.data()
        } as UsersModule;
      })
    });
  }

  onEdit(emp: UsersModule) {
    this.service.FormData = Object.assign({}, emp);
  }

  onDelete(id: string) {
    if (confirm("¿Esta seguron?\nse eliminara el usuario")) {
      this.firestore.doc('users/' + id).delete();
      alert("Registro eliminado");
    }
  }

}
