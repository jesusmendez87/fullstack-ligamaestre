import { Equipos } from "../../pages/equipos/equipos";
import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable, map } from "rxjs";
import { Iequipo } from "../models/equipos.model";
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root', })
export class VerEquipo {

    private apiUrl = environment.apiUrl + '/api/equipos';

    constructor(private http: HttpClient) {}

  getEquipos(): Observable<Iequipo[]> {
      const token = localStorage.getItem('token');
 console.log('ENVIANDO TOKEN:', token);

    return this.http.get<Iequipo[]>(this.apiUrl, {
       headers: {
      Authorization: `Bearer ${token}`

}
    });
  }

}
