document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('#payment-form');
    var client_token = document.querySelector('#client_token').value;

    var inputs = document.querySelectorAll('input');

    console.log(inputs);

    for (var i = 0; i < inputs.length; i++) {

      inputs[i].addEventListener('onkeydown', function(evt) {
        if (evt.witch === 13) {
          evt.preventDefault();
          evt.stopPropagation();
        }
      });
    }

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

                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;

                    form.submit();
                });
            });
        });
});
