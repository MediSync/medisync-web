import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AngularFireModule } from "@angular/fire";
import { AngularFirestoreModule } from "@angular/fire/firestore";
import { FormsModule, ReactiveFormsModule } from "@angular/forms";
import { AngularFontAwesomeModule } from 'angular-font-awesome';

import { AppComponent } from './app.component';
import { environment } from 'src/environments/environment';
import { UsersComponent } from './components/users/users.component';
import { UserRegistrerComponent } from './components/users/user-registrer/user-registrer.component';
import { UserListComponent } from './components/users/user-list/user-list.component';
import { UsersService } from './services/users.service';
import { UserLoginComponent } from './components/users/user-login/user-login.component';

@NgModule({
  declarations: [
    AppComponent,
    UsersComponent,
    UserRegistrerComponent,
    UserListComponent,
    UserLoginComponent
  ],
  imports: [
    BrowserModule,
    AngularFireModule.initializeApp(environment.firebaseConfig),
    AngularFirestoreModule,
    AngularFontAwesomeModule,
    FormsModule,
    ReactiveFormsModule
  ],
  providers: [
    UsersService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
