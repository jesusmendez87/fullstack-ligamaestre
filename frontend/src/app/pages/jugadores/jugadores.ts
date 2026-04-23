import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { VerPartido } from '../../core/services/verPartido';
import { userService } from '../../core/services/ver-usuario';
import { IUser } from '../../core/models/user.model';
import { IActaEvento } from './../../core/services/verPartido';

@Component({
  selector: 'app-jugadores',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './jugadores.html',

  styleUrl: './jugadores.css',
})
export class Jugadores {
     jugadores: IUser[] = [];

  protected actas: IActaEvento[] = [];
  protected loading: boolean = true;
  protected error: string | null = null;

  constructor(
    private jugador: userService) { }

      ngOnInit() {
    console.log('Iniciando carga de jugadores...');
    this.getJugadores();
  }

    getJugadores() {
    this.jugador.getUsersByRole('jugador').subscribe({
      next: (data) => {
        this.jugadores = data;  // backend filtra por rol
        console.log('Jugadores cargados:', this.jugadores);
      },
      error: (err) => {
        console.error('Error al cargar los jugadores:', err);
        this.error = err.message; //
      }

    });



  };
}
