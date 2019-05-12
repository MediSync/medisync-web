import { Injectable } from '@angular/core';
import { UsersModule } from '../models/users/users.module';

@Injectable({
  providedIn: 'root'
})
export class UsersService {
  FormData: UsersModule;

  constructor() { }
}
