import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Import komponen navbar
import initNavbar from './user/navbar';

// Import logic khusus halaman profil
import './user/profile';

