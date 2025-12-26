document.addEventListener('DOMContentLoaded', function() {
    const headerWrapper = document.querySelector('.header-top-wrapper');
    const stickyHeader = document.querySelector('.sticky-header');
    const mainBranding = document.querySelector('.site-header > .container > .site-branding');
    
    if (mainBranding) {
        window.addEventListener('scroll', function() {
            const rect = mainBranding.getBoundingClientRect();
            
            // Toggle .is-scrolled for header-center-sticky
            if (headerWrapper) {
                if (rect.bottom < 0) {
                    headerWrapper.classList.add('is-scrolled');
                } else {
                    headerWrapper.classList.remove('is-scrolled');
                }
            }

            // Toggle .is-sticky for the sliding sticky-header
            if (stickyHeader) {
                if (rect.bottom < 0) {
                    stickyHeader.classList.add('is-sticky');
                } else {
                    stickyHeader.classList.remove('is-sticky');
                }
            }
        });
    }

    // Sidebar Menu Logic
    const sideMenu = document.getElementById('side-menu');
    const overlay = document.querySelector('.side-menu-overlay');
    const menuToggles = document.querySelectorAll('.menu-toggle, .menu-toggle-sticky');
    const menuClose = document.querySelector('.menu-close');

    function openMenu() {
        sideMenu.classList.add('active');
        overlay.classList.add('active');
        document.body.classList.add('side-menu-active');
    }

    function closeMenu() {
        sideMenu.classList.remove('active');
        overlay.classList.remove('active');
        document.body.classList.remove('side-menu-active');
    }

    menuToggles.forEach(toggle => {
        toggle.addEventListener('click', openMenu);
    });

    if (menuClose) {
        menuClose.addEventListener('click', closeMenu);
    }

    if (overlay) {
        overlay.addEventListener('click', closeMenu);
    }

    // Floating Side Controls Logic
    const floatingControls = document.querySelector('.floating-side-controls');
    const backToTopBtn = document.querySelector('.float-back-to-top');

    if (floatingControls) {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                floatingControls.classList.add('is-visible');
            } else {
                floatingControls.classList.remove('is-visible');
            }
        });
    }

    if (backToTopBtn) {
        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // Prevent floating controls from entering footer
    const footer = document.querySelector('.site-footer');
    if (floatingControls && footer) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    floatingControls.classList.add('hide-for-footer');
                } else {
                    floatingControls.classList.remove('hide-for-footer');
                }
            });
        }, {
            threshold: 0.1
        });

        observer.observe(footer);
    }
});
