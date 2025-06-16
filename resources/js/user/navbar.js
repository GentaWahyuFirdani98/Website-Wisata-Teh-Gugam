// File: resources/js/navbar.js

export default function initNavbar() {
    // Wait for Alpine to be ready
    document.addEventListener('alpine:init', () => {
        console.log('Alpine initialized, setting up navbar...');
    });

    // Initialize navbar functionality
    const setupNavbar = () => {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (!mobileMenuButton || !mobileMenu) {
            console.warn('Navbar elements not found');
            return null;
        }

        // Toggle mobile menu
        const toggleMobileMenu = (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            // Toggle visibility
            mobileMenu.classList.toggle('hidden');
            
            // Toggle icon hamburger/close
            updateMenuIcon();
            
            // Dispatch custom event for Alpine components if needed
            window.dispatchEvent(new CustomEvent('navbar:toggle', {
                detail: { isOpen: !mobileMenu.classList.contains('hidden') }
            }));
        };

        // Update menu icon based on menu state
        const updateMenuIcon = () => {
            const svg = mobileMenuButton.querySelector('svg');
            const path = svg.querySelector('path');
            
            if (mobileMenu.classList.contains('hidden')) {
                // Menu closed - show hamburger
                path.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            } else {
                // Menu open - show X
                path.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                mobileMenuButton.setAttribute('aria-expanded', 'true');
            }
        };

        // Close mobile menu
        const closeMobileMenu = () => {
            mobileMenu.classList.add('hidden');
            updateMenuIcon();
            
            // Dispatch close event
            window.dispatchEvent(new CustomEvent('navbar:close'));
        };

        // Open mobile menu
        const openMobileMenu = () => {
            mobileMenu.classList.remove('hidden');
            updateMenuIcon();
            
            // Dispatch open event
            window.dispatchEvent(new CustomEvent('navbar:open'));
        };

        // Event listeners
        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        
        // Close menu when clicking menu links
        const menuLinks = mobileMenu.querySelectorAll('a');
        menuLinks.forEach(link => {
            link.addEventListener('click', closeMobileMenu);
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', (event) => {
            const isClickInsideMenu = mobileMenu.contains(event.target);
            const isClickOnButton = mobileMenuButton.contains(event.target);
            
            if (!isClickInsideMenu && !isClickOnButton && !mobileMenu.classList.contains('hidden')) {
                closeMobileMenu();
            }
        });
        
        // Handle window resize - hide mobile menu on desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) { // lg breakpoint
                closeMobileMenu();
            }
        });

        // Handle escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                closeMobileMenu();
            }
        });

        // Set initial ARIA attributes
        mobileMenuButton.setAttribute('aria-expanded', 'false');
        mobileMenuButton.setAttribute('aria-controls', 'mobile-menu');
        mobileMenu.setAttribute('aria-hidden', 'true');

        console.log('Navbar initialized successfully');

        // Return public API
        return {
            toggle: toggleMobileMenu,
            close: closeMobileMenu,
            open: openMobileMenu,
            isOpen: () => !mobileMenu.classList.contains('hidden')
        };
    };

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupNavbar);
    } else {
        return setupNavbar();
    }
}

// Auto-initialize if not imported
if (typeof window !== 'undefined') {
    window.addEventListener('DOMContentLoaded', () => {
        if (!window.TeaGarden?.navbar) {
            initNavbar();
        }
    });
}