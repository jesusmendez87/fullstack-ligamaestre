import { partido } from '../../core/services/verPartido';
import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../core/services/auth';
import { VerPartido } from '../../core/services/verPartido';
import { Ipartido } from '../../core/models/partidos.model';

import { IResultado } from '../../core/services/verPartido';



@Component({
  selector: 'app-resultados',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './resultados.html',
  styleUrls: ['./resultados.css'], // corregido
})
export class Resultados implements OnInit {

  protected partido: Ipartido[] = [];
  protected iresultado: IResultado[] = [];
  protected loading: boolean = true;
  protected error: string | null = null;

  constructor(

    private verPartido: VerPartido,
  ) {}


ngOnInit() {
  console.log('Iniciando carga de partidos...');
  this.cargarPartidos( );
}


private cargarPartidos() {

  this.verPartido.getPartidos().subscribe({
    next: (res: any) => {
      const partidos = res.data || [];

      this.partido = partidos.map((p: any) => ({
        ...p,
        local_id: p.local_id || p.club_Local_Id,
        visitante_id: p.visitante_id || p.club_Visitante_Id
      }));

      console.log('Normalizados:', this.partido);
      this.loading = false;
    },
    error: (err) => {
      console.error('Error cargando partidos:', err);
      this.error = 'No se pudieron cargar los partidos';
      this.loading = false;
    }
    
  });


}


}
