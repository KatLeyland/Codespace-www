describe ('Tests contents exist on home page', () => {
    it('Loads page', () => {
        cy.visit('http://127.0.0.1:5500/index.html');
    })
      it('checks title and viewing', () => {
        cy.title().should('include', 'T-shirt shop');
    })
      it('checks navbar has link text', () => {
        cy.get('data-cy=navbar').should('have.text','WT');
        cy.get('data-cy=navbar').should('have.text','Home');
        cy.get('data-cy=navbar').should('have.text','Register');
        cy.get('data-cy=navbar').should('have.text','Login');
    })
    it('checks tshirt cards have content', () => {
      cy.get('data-cy=item-name').should('have.text');
      cy.get('data-cy=item-desc').should('have.text');
      cy.get('data-cy=item-price').should('have.text');
      cy.get('data-cy=buy-btn').click();
    })
    it('checks tshirts images are displayed', () => {
    // 1. Select all image (`img`) elements on the page.
      cy.get('img').each(($img) => {
  // 2. Scroll the image into view and check if it's visible.
      cy.wrap($img).scrollIntoView().should('be.visible');

  // 3. Ensure the natural width and height is greater than 0.
      expect($img[0].naturalWidth).to.be.greaterThan(0);
      expect($img[0].naturalHeight).to.be.greaterThan(0);
});
});
    it('checks buy now buttons exist', () => {
    
    })

})

describe ('Tests registration', () => {
    it('clicks through from home to the registration page', () => {
    
     })
    it('Submits without any input', () => {
    
    })
    it('inputs names then submits', () => {
    
    })
    it('inputs names then submits', () => {
    
    })
    
})
describe ('Tests login', () => {
    it('', () => {
    
      })
    
})
describe ('Tests purchasing', () => {
    it('', () => {
    
    })
})