import './bootstrap';

// Mobile menu functionality
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    console.log('Mobile menu elements:', { mobileMenuButton, mobileMenu });
    
    if (mobileMenuButton && mobileMenu) {
        let isMenuOpen = false;
        
        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.style.display = 'block';
                mobileMenuButton.setAttribute('aria-expanded', 'true');
                // Change icon to close (X)
                mobileMenuButton.innerHTML = `
                    <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                `;
                console.log('Mobile menu opened');
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.style.display = 'none';
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                // Change icon back to hamburger
                mobileMenuButton.innerHTML = `
                    <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                `;
                console.log('Mobile menu closed');
            }
        }
        
        function closeMenu() {
            if (isMenuOpen) {
                isMenuOpen = false;
                mobileMenu.classList.add('hidden');
                mobileMenu.style.display = 'none';
                mobileMenuButton.setAttribute('aria-expanded', 'false');
                // Reset icon to hamburger
                mobileMenuButton.innerHTML = `
                    <svg class="h-6 w-6 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                `;
            }
        }
        
        // Multiple event listeners for better mobile support
        mobileMenuButton.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            console.log('Mobile menu button clicked');
            toggleMenu();
        });
        
        // Touch events for mobile devices
        mobileMenuButton.addEventListener('touchstart', function(e) {
            e.preventDefault();
            console.log('Mobile menu touch start');
        });
        
        mobileMenuButton.addEventListener('touchend', function(e) {
            e.preventDefault();
            console.log('Mobile menu touch end');
            toggleMenu();
        });
        
        // Close mobile menu when clicking on a link
        const mobileMenuLinks = mobileMenu.querySelectorAll('a');
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                console.log('Mobile menu link clicked:', link.href);
                closeMenu();
            });
        });
        
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                closeMenu();
            }
        });
        
        // Close mobile menu on window resize (if screen becomes larger)
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) { // md breakpoint
                closeMenu();
            }
        });
        
        // Close mobile menu on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });
        
    } else {
        console.error('Mobile menu elements not found:', { mobileMenuButton, mobileMenu });
    }
});
