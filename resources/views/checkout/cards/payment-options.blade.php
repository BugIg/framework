<div class=" border-b border-gray-200 pb-5">
    <div class="mt-6">
        <h4 class="text-lg leading-6 font-medium text-gray-900">
            Payment Information
        </h4>
        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            This information will be used to identified your order payment information.
        </p>
    </div>
    <div class="mt-3">

        @foreach ($paymentOptions as $payment)
        <p>
            {{-- {{ $payment->render() }} --}}
            <input type="radio" name="payment_option" value="a-cash-on-delivery" checked  /> Cash on Delivery
        </p>
        @endforeach
        {{-- <input type="hidden" name="payment_option" v-model="paymentOption" /> --}}

    </div>
</div>