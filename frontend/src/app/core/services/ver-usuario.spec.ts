import { TestBed } from '@angular/core/testing';
import { HttpClientTestingModule, HttpTestingController } from '@angular/common/http/testing';
import { userService } from './ver-usuario';
import { IUser } from '../models/user.model';

describe('VerUsuarioService', () => {
  let service: userService;
  let httpMock: HttpTestingController;

  beforeEach(() => {
    TestBed.configureTestingModule({
      imports: [HttpClientTestingModule],
      providers: [userService]
    });

    service = TestBed.inject(userService);
    httpMock = TestBed.inject(HttpTestingController);
  });

  afterEach(() => {
    httpMock.verify();
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });

  describe('getUsersByRole', () => {
    it('should return users filtered by role', () => {
      const rol = 'jugador';

      const mockUsers: IUser[] = [
        {
          _id: '2',
          username: 'ana123',
          password: '1234',
          name: 'Ana',
          rol: 'jugador'
        },
        {
          _id: '3',
          username: 'user3',
          password: '1234',
          name: 'User3',
          rol: 'jugador'
        }
      ];

      // Act
      service.getUsersByRole(rol).subscribe(users => {
        // Assert
        expect(users).toEqual(mockUsers);
      });

      // Intercepta la petición HTTP
      const req = httpMock.expectOne(`${service['apiUrl']}?rol=${rol}`);

      expect(req.request.method).toBe('GET');

      // Simula respuesta del backend
      req.flush(mockUsers);
    });
  });
});
