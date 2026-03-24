/* BioNeoMed Main JavaScript */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        var mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
        var nav = document.querySelector('.site-navigation');

        if (mobileMenuToggle && nav) {
            mobileMenuToggle.addEventListener('click', function() {
                nav.classList.toggle('active');
                this.setAttribute('aria-expanded', nav.classList.contains('active'));
            });
        }

        var smoothLinks = document.querySelectorAll('a[href^="#"]');
        smoothLinks.forEach(function(link) {
            link.addEventListener('click', function(e) {
                var target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
})();
