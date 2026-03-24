/* BioNeoMed Donation JavaScript */
(function() {
    'use strict';

    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('bioneomed-newsletter-form');
        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                var email = this.querySelector('[name="email"]').value;
                var nonce = this.querySelector('[name="nonce"]').value;
                var data = new FormData();
                data.append('action', 'bioneomed_mailchimp_subscribe');
                data.append('email', email);
                data.append('nonce', nonce);

                fetch(bioneomed_ajax.ajax_url, {
                    method: 'POST',
                    body: data,
                }).then(function(r) {
                    return r.json();
                }).then(function(res) {
                    var msg = document.getElementById('bioneomed-newsletter-message');
                    if (msg) {
                        msg.textContent = res.data ? res.data.message : 'Thank you!';
                    }
                });
            });
        }
    });
})();
