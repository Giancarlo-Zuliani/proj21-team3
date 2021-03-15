document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('#payment-form');
    var client_token = document.querySelector('#client_token').value;

    //BRAINTREE
    braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        },
        //CREATE BRAINTREE INSTANCE AND HANDLE ERROR
        function(createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function(event) {
                //PREVENT SUBMIT BEFORE BRAINTREE PAYMENT
                event.preventDefault();
                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }
                    wait();
                    document.querySelector('#nonce').value = payload.nonce;
                    //SUBMIT FORM 
                    form.submit();
                });
            });
        });
});

//WAIT ANIMATIONS POINTS ANIMATION
function processingAnimation() {
    let processingString = document.getElementById('processingAnimation');
    processingString.textContent.length === 5 ?
        processingString.innerHTML = "." :
        processingString.innerHTML += '.';
};
//WAIT ANIMATION
function wait() {
    let banner = document.getElementById('waitBanner');
    banner.style.display = "block";
    banner.style.opacity = "1";
    setInterval(() => {
        processingAnimation()
    }, 300);
    //PREVENT MOUSE SCROLL 
    window.addEventListener("wheel", e => e.preventDefault(), { passive: false })
};