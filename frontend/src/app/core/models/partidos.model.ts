import { IActaEvento, IResultado } from './../services/verPartido';
export interface Ipartido {
  id?: string;
  club_Local_Id: string;
  club_Visitante_Id: string;
  liga_id: number;
  resultado: IResultado;

  acta?: IActaEvento[]
 }

