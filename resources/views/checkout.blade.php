@extends('layouts.app')

@section('content')
<div id="box-checkout" class="container-fluid">

  <div class="container-ms-checkout">
    <div class="box-checkout-2">
      <div class="text-center">
        <h2>Stai acquistando la sponsorship :{{ $sponsorship->id }}</h2>
        <h1>{{ $sponsorship->name }}</h1>

      </div>

      <div id="dropin-wrapper">
        <div id="checkout-message"></div>
        <div id="dropin-container"></div>
        <button id="submit-button">Submit payment</button>
      </div>
    </div>
  </div>

  <!-- <button>
        procedi con l'acquisto
    </button> -->


</div>
@endsection

<style lang=scss scoped>
  #box-checkout {
    padding: 0;
  }

  .box-checkout-2 {
    background-color: #5A5A5A;
    padding: 5vh;

    h2 {
      color: white;
    }
  }

  .container {
    max-width: 1200px;
    margin: 0 auto;
  }

  #dropin-wrapper {
    width: 500px;
    margin: 0 auto;
    text-align: center;
  }

  .container-ms-checkout {
    padding: 5vh;
    background-color: #FFCC00;
    height: 100vh;
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

  document.addEventListener('DOMContentLoaded', function() {
    var button = document.querySelector('#submit-button');

    axios.get('http://127.0.0.1:8000/api/v1/generate')
      .then(response => {

        const token = response.data.token;

        braintree.dropin.create({
            // TOKENIZATION KEY
            authorization: token,
            container: '#dropin-container'
          },

          function(createErr, instance) {
            button.addEventListener('click', function() {
              instance.requestPaymentMethod(function(requestPaymentMethodErr, payload) {
                // When the user clicks on the 'Submit payment' button this code will send the
                // encrypted payment information in a variable called a payment method nonce
                $.ajax({
                  type: 'POST',
                  url: 'http://127.0.0.1:8000/api/v1/make/payment',
                  data: {

                    "token": payload.nonce,
                    "sponsorship": sponsorshipId
                  }
                }).done(function(result) {
                  if (result.success) {
                    // Collega la sponsorizzazione al profilo dell'utente
                    $.ajax({
                      type: 'POST',
                      url: 'http://127.0.0.1:8000/sponsorship/link',
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      data: {
                        "sponsorship_id": sponsorshipId
                      }
                    }).done(function(linkResult) {
                      if (linkResult.success) {
                        $('#checkout-message').html('<h1>Success</h1><p>Ti ringraziamo per il tuo acquisto!🥳</p>');
                      } else {
                        console.log(linkResult);
                        $('#checkout-message').html('<h1>Error</h1><p>Errore nel collegare la sponsorizzazione al profilo.</p>');
                      }
                    });

                    // Rimuovi il pulsante "Submit payment"
                    $('#submit-button').remove();
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
    margin-bottom: 50px;
  }

  #dropin-wrapper {
    color: black;
    background-color: white;

    #checkout-message {
      color: black;

      p {
        color: black;
      }
    }

    #dropin-container {
      background-color: white;
      color: black;
    }

    #submit-button {
      background-color: black;
      color: white;
      padding: 8px;
      border-radius: 8px;
      margin-bottom: 10px;
    }
  }
</style>