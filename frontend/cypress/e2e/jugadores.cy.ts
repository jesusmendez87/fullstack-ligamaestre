  /// <reference types="cypress" />

describe('Flujo administrador - Jugadores', () => {
  //logueado admin
beforeEach(() => {
  cy.visit('https://fullstack-ligamaestre-1.onrender.com/login/');

  cy.get('input[placeholder="Usuario"]').type('admin');
  cy.get('input[placeholder="Contraseña"]').type('1234');
  cy.get('button').contains('Entrar').click();

  cy.url().should('not.include', '/login');
});

afterEach(() => {
  cy.visit('https://fullstack-ligamaestre-1.onrender.com/jugadores');

  // 🔥 asegurar que NO te manda a login
  cy.url().should('include', '/jugadores');
});


  // CASO 1: listado
  it('debe mostrar la lista de jugadores', () => {
    cy.get('.card', { timeout: 10000 }).should('exist');

    cy.get('.card')
      .its('length')
      .should('be.greaterThan', 0);
  });

  // CASO 2: creación correcta
  it('debe crear un jugador correctamente', () => {
    const username = 'JuanTest' + Date.now(); // 🔥 evita duplicados

    cy.visit('https://fullstack-ligamaestre-1.onrender.com/registro');

    cy.get('input[placeholder="Usuario"]').type(username);
    cy.get('input[placeholder="Nombre"]').type('Juan Pérez García');
    cy.get('input[placeholder="Contraseña"]').type('1111');
    cy.get('input[placeholder="Confirmar Contraseña"]').type('1111');

    cy.get('select').select('Jugador');

    cy.get('button').contains('Registrarse').click();

      cy.contains('exitoso').should('be.visible');


  });

  // CASO 3: error controlado (contraseñas distintas)
  it.only('debe mostrar error si las contraseñas no coinciden', () => {

    cy.visit('https://fullstack-ligamaestre-1.onrender.com/registro');

    cy.get('input[placeholder="Usuario"]').type('ErrorUser');
    cy.get('input[placeholder="Nombre"]').type('Error Test');
    cy.get('input[placeholder="Contraseña"]').type('1111');
    cy.get('input[placeholder="Confirmar Contraseña"]').type('2222');

    cy.get('select').select('Jugador');

    cy.get('button').contains('Registrarse').click();

    cy.contains('contraseñas').should('be.visible');

    cy.url().should('include', '/registro');
  });

});
