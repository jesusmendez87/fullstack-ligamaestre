import { IActaEvento } from './../../core/services/verPartido';
import { TestBed } from '@angular/core/testing';
import { of, throwError } from 'rxjs';
import { Jugadores } from './jugadores';
import { VerPartido } from '../../core/services/verPartido';
import { userService } from '../../core/services/ver-usuario';
import { provideHttpClient } from '@angular/common/http';

describe('Jugadores', () => {

  let verPartidoMock: any;
  let userServiceMock: any;

  beforeEach(async () => {

    verPartidoMock = {
      getUsersByRole: jasmine.createSpy().and.returnValue(of([]))
    };

    userServiceMock = {
      getUsersByRole: jasmine.createSpy().and.returnValue(of([
        { id: '1', name: 'Pedro', rol: 'jugador' }
      ]))
    };

    await TestBed.configureTestingModule({
      imports: [Jugadores],
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

    expect(component['actas'].length).toBe(2);
    expect(component['loading']).toBeFalse();
  });

  it('Debe contener al jugador Pedro', () => {
  // Setup the mock
  const mockResponse = [
    { jugadores: [{ jugador: 'Juan' }, { jugador: 'Pedro' }] }
  ];
  userServiceMock.getUsersByRole.and.returnValue(of(mockResponse));

  // Initialize
  const fixture = TestBed.createComponent(Jugadores);
  const component = fixture.componentInstance;
  fixture.detectChanges();
 
  const hasPedro = component['actas'].some(acta => acta.jugador === 'Po'); 
  
  expect(hasPedro).toBeTrue();
});


it('Debe dar error de cabeceras', () => {

  userServiceMock.getUsersByRole.and.returnValue(
    throwError(() => new Error('Error'))
  );

  const fixture = TestBed.createComponent(Jugadores);
  const component = fixture.componentInstance;

  fixture.detectChanges();

  expect(component['error']).toBe('No se pudieron cargar las actas');
  expect(component['loading']).toBeFalse();
});


});