import './bootstrap';
import 'https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js';
import 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js';
import 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js';
import Alpine from 'alpinejs';
import.meta.glob([
    '../images/**',
    '../fonts/**',
  ]);
window.Alpine = Alpine;
Alpine.start();
