import './bootstrap';
import '@tailwindplus/elements'
import reply from './alpine/reply';

import Alpine from 'alpinejs'

window.Alpine = Alpine

Alpine.data('reply',reply);
Alpine.start()