import { IActaEvento } from './../../core/services/verPartido';
import { TestBed, tick } from '@angular/core/testing';
import { of, throwError } from 'rxjs';
import { Jugadores } from './jugadores';
import { VerPartido } from '../../core/services/verPartido';
import { userService } from '../../core/services/ver-usuario';

import { HttpClientTestingModule } from '@angular/common/http/testing';
import { fakeAsync, flush } from '@angular/core/testing';


describe('Jugadores', () => {

  let verPartidoMock: any;
  let userServiceMock: any;

  beforeEach(async () => {

    verPartidoMock = {
      getUsersByRole: jasmine.createSpy().and.returnValue(of([]))
    };

    userServiceMock = {
      getUsersByRole: jasmine.createSpy().and.returnValue(of([
        { id: '1', name: 'Pedro', rol: 'jugador' },
        { id: '2', name: 'Juan', rol: 'jugador'},
        { id: '3', name: 'Ana', rol: 'arbitro' }
      ])),
        };



    await TestBed.configureTestingModule({
      imports: [Jugadores, HttpClientTestingModule],
      providers: [
        { provide: VerPartido, useValue: verPartidoMock },
        { provide: userService, useValue: userServiceMock }
      ]
    }).compileComponents();
  });

  it('debe crear el componente', () => {
    const fixture = TestBed.createComponent(Jugadores);
    const component = fixture.componentInstance;
    expect(component).toBeTruthy();
  });

  it('Cargar los jugadores del mocks', () => {

    userServiceMock.getUsersByRole.and.returnValue(of([
      { id: '1', name: 'Pedro', rol: 'jugador' },
      { id: '2', name: 'Juan', rol: 'jugador' }
    ]));

    const fixture = TestBed.createComponent(Jugadores);
    const component = fixture.componentInstance;

    fixture.detectChanges();

    expect(component['jugadores'].length).toBe(2);

  });

  it('Debe contener al jugador Pedro', () => {
  // Setup the mock
   userServiceMock.getUsersByRole.and.returnValue(of([
      { id: '1', name: 'Pedro', rol: 'jugador' },
      { id: '2', name: 'Juan', rol: 'jugador' }
    ]));


  // Initialize
  const fixture = TestBed.createComponent(Jugadores);
  const component = fixture.componentInstance;
  fixture.detectChanges();

  const hasPedro = component['jugadores'].some(jugador => jugador.name === 'Juan');

  expect(hasPedro).toBeTrue();
});



  it('Debe manejar error al cargar jugadores', fakeAsync(() => {

    userServiceMock.getUsersByRole.and.returnValue(
      throwError(() => new Error('Error'))
    );

    const fixture = TestBed.createComponent(Jugadores);
    const component = fixture.componentInstance;

    fixture.detectChanges();
    tick();
expect(component['error']).toBe('Error');

  }));

});
