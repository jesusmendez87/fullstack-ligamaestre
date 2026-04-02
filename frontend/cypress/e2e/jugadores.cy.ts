/// <reference types="cypress" />

describe('Flujo administrador - Jugadores', () => {

  beforeEach(() => {
  cy.visit('https://fullstack-ligamaestre-1.onrender.com/login/');

cy.get('input[placeholder="Usuario"]', { timeout: 5000 }).should('be.visible').type('admin');
cy.get('input[placeholder="Contraseña"]', { timeout: 5000 }).should('be.visible').type('1234');
  cy.get('button').contains('Entrar').click();


    // Esperar a que redireccione
    cy.url().should('not.include', '/login');
  });

  // ✅ CASO 1: listado correcto
  it('debe mostrar la lista de jugadores', () => {
    cy.visit('https://fullstack-ligamaestre-1.onrender.com/jugadores');

    cy.get('.card').should('have.length.greaterThan', 0);

    cy.get('.card').first().within(() => {
      cy.contains('Nombre');
    });
  });

  // CASO 2: creación correcta
  it('debe crear un jugador correctamente', () => {
    cy.visit('https://fullstack-ligamaestre-1.onrender.com/registro');

    cy.get('input[placeholder="Usuario"]').type('JuanTest');
    cy.get('input[placeholder="Nombre"]').type('Juan Pérez García');
    cy.get('input[placeholder="Contraseña"]').type('1111');
    cy.get('input[placeholder="Confirmar Contraseña"]').type('1111');

    // seleccionar rol correctamente (IMPORTANTE)
    cy.get('select').select('Jugador');

     cy.get('button').contains('Registrarse').click();

    // validar redirección o mensaje
    cy.contains('Jugador creado correctamente').should('be.visible');

    // validar que aparece en lista
    cy.visit('https://fullstack-ligamaestre-1.onrender.com/jugadores');
    cy.contains('Juan Pérez García').should('exist');
  });


});
