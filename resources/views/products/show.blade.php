@extends('partials.master')

@section('content')
    <div class="row">
        <div>
            <h2>Show Product</h2>
        </div>
        <div class="my-3">
            <a class="btn btn-dark btn-sm" href="{{ route('products.index') }}"> Back</a>
        </div>
        <div class="col-lg-8">
            <div class="form-group mb-3">
                <strong>Name:</strong>
                <p>{{ $product->name }}</p>
            </div>
            <div class="form-group mb-3">
                <strong>Details:</strong>
                <p>{!! $product->detail !!}</p>
                <div class="d-flex justify-content-start align-items-center">
                  <b>$</b><input type="number" class="form-control w-25 m-2 text-right" name="price" id="price" value="{{ $product->price }}" disabled/>
                </div>
                <p><strong>Pay with Paypal:</strong></p>
                <!-- Set up a container element for the button -->
                <div class="w-50" id="paypal-button-container"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <img src="{{ $product->image ? $product->image->url() : 'https://dummyimage.com/300x300/f2f2f2/3b3b3b.png&text=product' }}"
            width="300"
            alt="">
        </div>
    </div>

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script>
      let price = document.querySelector("#price").value
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: price // Can also reference a variable or function // YouCan add input validation
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            const element = document.getElementById('paypal-button-container');
            element.innerHTML = `<div class="alert alert-success p-2"><p class="p-0 m-0">Thank you for your payment!</p></div>`;
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection
