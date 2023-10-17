@extends('frontend.layout.header')
@section('title')
payement
@endsection()
@section('content')
<div class="col-md-12">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                
                    <h5 class="panel-title" >payement</h5>
                </div>
                <div class="panel-body">
      
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
  
                     <form id='checkout-form' method='post' action="{{ route('stripe.post') }}">   
                        @csrf             
                        <input type='hidden' name='stripeToken' id='stripe-token-id'>                              
                        <br>
                        <div id="card-element" class="form-control" ></div>
                        <button 
                            id='pay-btn'
                            class="btn btn-success mt-3"
                            type="button"
                            style="margin-top: 20px; width: 100%;padding: 7px;"
                            onclick="createToken()">PAYER
                        </button>
                    <form>
      
                </div>
            </div>        
        </div>
    </div>
                  
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
  
    var stripe = Stripe('{{ env('STRIPE_KEY') }}')
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');
  
    /*------------------------------------------
    --------------------------------------------
    Create Token Code
    --------------------
    ------------------------
    --------------------------------------------*/
    function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {
   
            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }
  
            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }
</script>
@endsection()