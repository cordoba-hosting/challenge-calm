"use strict";

jQuery(document).ready(function ($) {
  $('.news-carousel__slider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplaySpeed: 5000,
    mobileFirst: true,
    responsive: [{
      breakpoint: 960,
      settings: {
        slidesToShow: 2
      }
    }]
  });
});
"use strict";

jQuery(document).ready(function () {
  showDropdownInMenu();
  setAlertCloseControl();
  changeSearchIcon();
});

function changeSearchIcon() {
  var mglass = document.getElementsByClassName('mglass')[0];
  mglass.innerHTML = '<span class="search-text paragraph">Search</span>';
  mglass.classList.add('icon-search');
}

function setAlertCloseControl() {
  var alertBannerStatus = sessionStorage.getItem('alertBanner');
  var alertBanner = document.getElementById('alert-banner');
  var closeAlertButton = document.getElementById('alert-close-button');

  if (alertBannerStatus !== 'hidden') {
    alertBanner.classList.remove('hidden');
  }

  closeAlertButton.addEventListener('click', function () {
    alertBanner.classList.add('hidden');
    sessionStorage.setItem('alertBanner', 'hidden');
  });
}

function showDropdownInMenu() {
  var topLevelNavItems = document.querySelectorAll('.main-menu > .nav-item');
  topLevelNavItems.forEach(function (navItem) {
    var subMenu = navItem.getElementsByClassName('sub-menu')[0];

    if (subMenu) {
      navItem.addEventListener('click', function (event) {
        event.preventDefault();
        subMenu.classList.toggle('visible');
        navItem.classList.toggle('active');
      });
      document.body.addEventListener('click', function (event) {
        if (!navItem.contains(event.target)) {
          subMenu.classList.remove('visible');
          navItem.classList.remove('active');
        }
      }); // subMenu.addEventListener('mouseleave', () => {
      //     subMenu.classList.remove('visible');
      //     navItem.classList.remove('active');
      // });
    }
  });
  var subMenuNavItems = document.querySelectorAll('.sub-menu > .nav-item');
  subMenuNavItems.forEach(function (navItem) {
    navItem.addEventListener('click', function (event) {
      event.stopPropagation();
    });
  });
}
"use strict";

jQuery(document).ready(function ($) {
  //== TOGGLE MOBILE MENU
  var burgerMenu = document.getElementById("burgerMenu");
  var searchBar = document.getElementById('navbar-section-search');
  var mainNav = document.getElementById("mainNav");
  var menuControlLabel = document.getElementById("menu-control-label");
  var headerSectionMain = document.getElementById('header__section-main');
  var menuShowing = false;

  var toggleMenu = function toggleMenu() {
    navMenu.classList.toggle("visible");
    searchBar.classList.toggle("visible");
    headerSectionMain.classList.toggle("visible");
    burgerMenu.classList.toggle("close");
    burgerMenu.classList.toggle("icon-close");
    burgerMenu.classList.toggle("icon-hamburger");
    menuShowing = !menuShowing;

    if (menuShowing) {
      menuControlLabel.innerHTML = 'Close';
    } else {
      menuControlLabel.innerHTML = 'Menu';
    }
  };

  burgerMenu.onclick = function () {
    return toggleMenu();
  };

  window.addEventListener("click", function (event) {
    if (menuShowing && !burgerMenu.contains(event.target) && !mainNav.contains(event.target) // !navDrawer.contains(event.target)
    ) {
      toggleMenu();
    }
  }); //== TOGGLE COLLAPSIBLE CONTENT IN COLUMN BLOCK

  var columnToggleButtons = document.querySelectorAll('.column-body.excerpt + .column-link');
  columnToggleButtons.forEach(function (button) {
    button.addEventListener('click', function () {
      var target = document.getElementById(button.attributes['data-target'].value);
      target.classList.toggle('excerpt');
    });
  });
  console.log(columnToggleButtons[0].attributes['data-target']);
});