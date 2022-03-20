describe('Like feature', () => {
  it('Tests the like feature', () => {
    cy.visit( '/property-listing/' );
      //test click first like button only
      cy.get('.property-listing-container > div:nth-child(1) > div.card-img-container > div')
        .click()
        .invoke('attr', 'data-mlsid')
        .then(mlsid => {
            //verifies if localstorage is there
            cy.getLocalStorage('liked').should("equal", `["${mlsid}"]`);
        });

      //checks class toggleling
      cy.get('.property-listing-container > div:nth-child(1) > div.card-img-container > div')
      .should('not.have.class', 'heart-stroke');
  });
})
