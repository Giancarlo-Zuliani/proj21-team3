document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('#payment-form');
    var client_token = document.querySelector('#client_token').value;


    braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        },
        function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    wait();
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
});
//UGLY ANIMATIONS
function processingAnimation() {
    let processingString = document.getElementById('processingAnimation');
    processingString.textContent.length === 5 ?
        processingString.innerHTML = "." :
        processingString.innerHTML += '.';
};

function wait() {
    let banner = document.getElementById('waitBanner');
    banner.style.display = "block";
    banner.style.opacity = "1";
    setInterval(() => {
        processingAnimation()
    }, 300);
    window.addEventListener("wheel", e => e.preventDefault(), { passive: false })
};