import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import {IUser} from '../models/user.model';
import { environment } from '../../../environments/environment';
import { map } from 'rxjs/operators';



@Injectable({
  providedIn: 'root'
})


export class userService  {

  private apiUrl = environment.apiUrl + '/api/jugadores';

  constructor(private http: HttpClient) {}
  //método para obtener rol de usuario

getUsersByRole(rol: string): Observable<IUser[]> {
  const token = localStorage.getItem('token');
  return this.http.get<IUser[]>(this.apiUrl, {
    headers: {
      Authorization: `Bearer ${token}`
    }
  }).pipe(
    map(users => users.filter(u => u.rol === rol))
  );
}
   //método para obtener nombre del usuario
  getUsuarioName(name: Object): Observable<IUser> {
    const token = localStorage.getItem('token');
    return this.http.get<IUser>(`${this.apiUrl}/${name}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  }

   //método para obtener id del usuario
  getUsuarioId(_id: Object): Observable<IUser> {
    const token = localStorage.getItem('token');
    return this.http.get<IUser>(`${this.apiUrl}/${_id}`, {
      headers: {
        Authorization: `Bearer ${token}`
      }
    });
  }
}


