@extends('layouts.createPage')
@section('title', 'Payments')
@section('form-content')
<script
src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"
integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ=="
crossorigin="anonymous"
></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form id="payment-form" action="{{ route('user.payments.transaction', ['apartment' => $apartment->id, 'sponsorship' => $sponsorship->id]) }}" method="POST">
                    @csrf
                    <script src="https://js.braintreegateway.com/web/dropin/1.32.0/js/dropin.js"></script>
                    <div id="dropin-container"></div>
                    <button id="submit-button" class="button button--small button--green">Acquista</button>
                    <input type="hidden" id="nonce" name="payment_method_nonce"/>
                </form>
            </div>
        </div>
    </div>

<style>
.button {
    cursor: pointer;
    font-weight: 500;
    left: 3px;
    line-height: inherit;
    position: relative;
    text-decoration: none;
    text-align: center;
    border-style: solid;
    border-width: 1px;
    border-radius: 3px;
    -webkit-appearance: none;
    -moz-appearance: none;
    display: inline-block;
}
.button--small {
    padding: 10px 20px;
    font-size: 0.875rem;
}
.button--green {
    outline: none;
    background-color: #64d18a;
    border-color: #64d18a;
    color: white;
    transition: all 200ms ease;
}
.button--green:hover {
    background-color: #8bdda8;
    color: white;
}
</style>

<script src="https://js.braintreegateway.com/web/dropin/1.33.2/js/dropin.min.js"></script>
    <script>
        const form = document.querySelector('#payment-form');
        const client_token = "{{ $token }}";

        braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
            }, function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
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
</script>
@endsection
