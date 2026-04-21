import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { environment } from '../../../environments/environment';

@Injectable({ providedIn: 'root' })
export class DeleteService {
 private apiUrl = environment.apiUrl + '/api';

  constructor(private http: HttpClient) {}

  delete(type: string, id: string) {
    const token = localStorage.getItem('token');  
    return this.http.delete(`${this.apiUrl}/delete/${type}/${id}`, {
      headers: { Authorization: `Bearer ${token}` }
    });
  }
}