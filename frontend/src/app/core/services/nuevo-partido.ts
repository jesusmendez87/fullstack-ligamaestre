import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { environment } from '../../../environments/environment';

@Injectable({
  providedIn: 'root',
})
export class NuevoPartido {
  private apiUrl = environment.apiUrl + '/api/partido';

  constructor(private http: HttpClient) {}
  //método para crear nuevos partidos con los pámetros necesarios haciendo post a la bbdd

nuevoPartido(
  club_Local_Id: string,
  club_Visitante_Id: string,
  fecha: Date,
  resultado: string
): Observable<any> {

  const token = localStorage.getItem('token');
  console.log('ENVIANDO TOKEN:', token);

  return this.http.post(
    this.apiUrl,
    {
      local_id: club_Local_Id,
      visitante_id: club_Visitante_Id,
      fecha,
      resultado
    },
    {
      headers: {
        Authorization: `Bearer ${token}`
      }
    }
  );
}
}
