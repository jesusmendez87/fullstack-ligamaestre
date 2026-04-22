import { Ipartido } from '../models/partidos.model';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable, BehaviorSubject, map } from 'rxjs';
import { environment } from '../../../environments/environment';

//exportamos las interfaces para usarlas en los componentes
export interface partido {
  _id?: string;
  liga_id: number;
  resultado: string;
    club_Local_Id: string;
  club_Visitante_Id: string;
}
 export interface IActaEvento {
  jugador: string;   // nombre del jugador
  minuto: number;    // minuto del evento
  tipo: 'gol' | 'amarilla' | 'roja' | 'cambio' | string;
}

export interface IResultado {
  local_score: number;
  visitante_score: number;
}


@Injectable({
  providedIn: 'root',
})

export class VerPartido {
    private apiUrl = environment.apiUrl + '/api/partidos';

    constructor(private http: HttpClient) {}


  getActas(): Observable<Ipartido[]> {
     const token = localStorage.getItem('token');
  return this.http.get<Ipartido[]>(this.apiUrl, {
    headers: {
      Authorization: `Bearer ${token}`}
    });

  }

getPartidos(): Observable<Ipartido[]> {
  const token = localStorage.getItem('token');

 console.log('ENVIANDO TOKEN:', token);

  return this.http.get<Ipartido[]>(this.apiUrl, {
    headers: {
           Authorization: `Bearer ${localStorage.getItem('token')}`

    }
  });
}
}
