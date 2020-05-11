<div class=" border-b border-gray-200 pb-5">
    <div class="mt-6">
        <h4 class="text-lg leading-6 font-medium text-gray-900">
            Shipping Information
        </h4>
        <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
            This information will be used to identified your order shipping information.
        </p>
    </div>
    <div class="mt-3">

        @foreach ($shippingOptions as $shipping)
        <p>
            {{-- {{ $shipping->render() }} --}}
            <input type="radio" name="shipping_option" value="pickup" checked  /> Pick Up
        </p>
        @endforeach
        {{-- <input type="hidden" name="shipping_option" v-model="shippingOption" /> --}}

    </div>
</div>