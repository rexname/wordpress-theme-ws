document.addEventListener('DOMContentLoaded', function() {
    const headerWrapper = document.querySelector('.header-top-wrapper');
    const siteBranding = document.querySelector('.site-branding');
    
    if (headerWrapper && siteBranding) {
        window.addEventListener('scroll', function() {
            // Deteksi posisi bawah logo utama terhadap viewport
            const rect = siteBranding.getBoundingClientRect();
            
            // Jika bagian bawah logo utama sudah melewati batas atas layar (0)
            if (rect.bottom < 0) {
                headerWrapper.classList.add('is-scrolled');
            } else {
                headerWrapper.classList.remove('is-scrolled');
            }
        });
    }
});
