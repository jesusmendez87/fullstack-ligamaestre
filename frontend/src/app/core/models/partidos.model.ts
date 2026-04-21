import { IActaEvento, IResultado } from './../services/verPartido';
export interface Ipartido {
  _id?: string;
  club_Local_Id: number;
  club_Visitante_Id: number;
  liga_id: number;
  resultado: IResultado;

  acta?: IActaEvento[]
 }

