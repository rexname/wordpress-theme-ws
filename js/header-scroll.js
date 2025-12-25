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
});
