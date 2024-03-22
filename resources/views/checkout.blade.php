@extends('layouts.app')

@section('content')
<div class="container">

    <div class="text-center">
        <h2>Stai acquistando la sponsorship :{{ $sponsorship->id }}</h2>
        <h1>{{ $sponsorship->name }}</h1>
        
    </div>

    <div id="dropin-wrapper">
    <div id="checkout-message"></div>
    <div id="dropin-container"></div>
    <button id="submit-button">Submit payment</button>
    </div>


    <!-- <button>
        procedi con l'acquisto
    </button> -->

    
</div>
@endsection

<style lang=scss scoped>
.container{
    max-width: 1200px;
    margin: 0 auto;

    #dropin-wrapper{
        width: 500px;
        margin: 0 auto;
        text-align: center;
    }
}
    

</style>


<!-- includes the Braintree JS client SDK -->
<script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.min.js"></script>

<!-- includes jQuery -->
<script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

<!-- includes axios -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<script>

const sponsorshipId = window.location.pathname.split('/').pop();
console.log(sponsorshipId)

    document.addEventListener('DOMContentLoaded', function () {
    var button = document.querySelector('#submit-button');
  
  axios.get('http://127.0.0.1:8000/api/v1/generate')
  .then(response => {

    const token = response.data.token;

    braintree.dropin.create({
    // Insert your tokenization key here
    authorization: token,
    container: '#dropin-container'
  }, 
  
  function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        // When the user clicks on the 'Submit payment' button this code will send the
        // encrypted payment information in a variable called a payment method nonce
        $.ajax({
          type: 'POST',
          url: 'http://127.0.0.1:8000/api/v1/make/payment',
          data: {

            // 'paymentMethodNonce': payload.nonce
            "token" : "fake-valid-nonce",
            "sponsorship" : sponsorshipId
        }
        }).done(function(result) {
          // Tear down the Drop-in UI
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              // Remove the 'Submit payment' button
              $('#submit-button').remove();
            }
          });

          if (result.success) {
            $('#checkout-message').html('<h1>Success</h1><p>Ti ringraziamo per il tuo acquisto!🥳</p>');
          } else {
            console.log(result);
            $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
          }
        });
      });
    });
  });
  })
})

    

  
</script>

<style lang=scss scoped>
    .text-center {
      color: white;
      margin-bottom: 50px;
    }
    #dropin-wrapper {
      color: black;
      background-color: white;
    
    #checkout-message {
      color: white;
      p {
        color:white;
      }
    }
      #dropin-container * {
        background-color: white;
        color:black;
      }
    
    #submit-button {
      background-color: black;
      color: white;
      padding: 8px;
      border-radius:8px;
      margin-bottom: 10px;
    }
    }
</style>