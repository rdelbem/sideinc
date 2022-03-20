describe('Validate Setup', () => {
    it('Theme is activated', () => {
      cy.visit( '/' );
      cy.get('#side-theme-styles-css');
      cy.get('#side-theme-scripts-js');
    })

    //in order for this to work you have to change permalink structure to post name
    it('Plugin is activated', () => {
      cy.visit( '/property-listing/' );
      cy.get('#side-plugin-styles-css');
      cy.get('#side-plugin-scripts-js');
      //checks if card container exists
      cy.get('.card-container');
      //checks if card container has img container div and it has an image inside it
      cy.get('.card-container > .card-img-container > img');
      //checks if the like feature is in place
      cy.get('.card-container > .card-img-container > .heart');
      //checks all infos realted to the real estate properties
      cy.get('.card-infos > p.card-infos-property');
      cy.get('.card-infos > strong > p.card-infos-price');
      cy.get('.card-infos > p.card-infos-address');
      cy.get('.card-infos > small > muted');
    })
})
