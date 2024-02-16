jQuery(document).ready(function ($) {

  //== TOGGLE MOBILE MENU

  const burgerMenu = document.getElementById("burgerMenu");
  const searchBar = document.getElementById('navbar-section-search');
  const mainNav = document.getElementById("mainNav");
  const menuControlLabel = document.getElementById("menu-control-label");
  const headerSectionMain = document.getElementById('header__section-main');
  let menuShowing = false;

  const toggleMenu = () => {
    navMenu.classList.toggle("visible");
    searchBar.classList.toggle("visible");
    headerSectionMain.classList.toggle("visible");
    burgerMenu.classList.toggle("close");
    burgerMenu.classList.toggle("icon-close");
    burgerMenu.classList.toggle("icon-hamburger");
    
    menuShowing = !menuShowing;
    if(menuShowing){
      menuControlLabel.innerHTML = 'Close'
    }
    else{
      menuControlLabel.innerHTML = 'Menu'
    }
  };

  burgerMenu.onclick = () => toggleMenu();

  window.addEventListener("click", function (event) {
    if (
        menuShowing &&
        !burgerMenu.contains(event.target) &&
        !mainNav.contains(event.target) 
        // !navDrawer.contains(event.target)
    ) {
      toggleMenu();
    }
  });



  //== TOGGLE COLLAPSIBLE CONTENT IN COLUMN BLOCK

  const columnToggleButtons = document.querySelectorAll('.column-body.excerpt + .column-link');

  columnToggleButtons.forEach(button => {
    button.addEventListener('click', () => {
      const target = document.getElementById(button.attributes['data-target'].value);
      target.classList.toggle('excerpt');
    })
  })
  console.log(columnToggleButtons[0].attributes['data-target']);

});