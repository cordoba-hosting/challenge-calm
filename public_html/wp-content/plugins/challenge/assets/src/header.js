jQuery(document).ready(function () {
    
    showDropdownInMenu();

    setAlertCloseControl();

    changeSearchIcon();
});

function changeSearchIcon(){
    const mglass = document.getElementsByClassName('mglass')[0];
    mglass.innerHTML = '<span class="search-text paragraph">Search</span>';
    mglass.classList.add('icon-search');
}

function setAlertCloseControl(){
    const alertBannerStatus = sessionStorage.getItem('alertBanner');
    const alertBanner = document.getElementById('alert-banner');
    const closeAlertButton = document.getElementById('alert-close-button');
    if (alertBannerStatus !== 'hidden') {
        alertBanner.classList.remove('hidden');
    }
    closeAlertButton.addEventListener('click', ()=> {
        alertBanner.classList.add('hidden');
        sessionStorage.setItem('alertBanner','hidden');
    });
}

function showDropdownInMenu(){
    const topLevelNavItems = document.querySelectorAll('.main-menu > .nav-item');
    
    topLevelNavItems.forEach(navItem => {
        const subMenu = navItem.getElementsByClassName('sub-menu')[0];
        if (subMenu) {
            navItem.addEventListener('click', (event) => {
                event.preventDefault();
                subMenu.classList.toggle('visible');
                navItem.classList.toggle('active');
                
            });
            document.body.addEventListener('click', (event) => {
                if (!navItem.contains(event.target)) {
                    subMenu.classList.remove('visible');
                    navItem.classList.remove('active');
                }
            });
            // subMenu.addEventListener('mouseleave', () => {
            //     subMenu.classList.remove('visible');
            //     navItem.classList.remove('active');
            // });
        }
    });

    const subMenuNavItems = document.querySelectorAll('.sub-menu > .nav-item');
    subMenuNavItems.forEach(navItem => {
        navItem.addEventListener('click', (event) => {
            event.stopPropagation();
        });
    });
}