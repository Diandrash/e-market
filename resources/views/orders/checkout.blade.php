@extends('layout.index')

@section('container')
    <section class="checkoutt mx-10 pt-20 md:pt-6 pb-16" id="checkout">
        <div class="header-text flex justify-between">
            <h1 class="text-2xl font-semibold">Checkout Page</h1>
        </div>
        
        <form action="/products/{{ $product->id }}/checkout/confirm" method="post" class="mt-7">
            @csrf
            <input type="hidden" name="product_id" value={{ $product->id }}>
            <input type="hidden" name="user_id" value={{ auth()->user()->id }}>
            <input type="hidden" name="seller_id" value={{ $product->seller->id }}>
            <input type="hidden" name="quantity" value={{ $quantity }}>
            <input type="hidden" name="total_price" value={{ $totalPrice }}>
            <input type="hidden" name="status" value="0">
            <div class="input-form">
                <label for="address" class="text-lg font-semibold">Address Details</label>
                <textarea name="address" id="address" class="w-full mt-3 p-3 font-semibold" rows="10" placeholder="Your Details Address Here"></textarea>
            </div>
            
            <div class="product-details mt-5 ">
                <h1 class="font-semibold text-lg">Product Details</h1>
                <div class="product container flex flex-wrap px-3 py-2 mt-2 bg-white rounded-lg shadow-md">
                    <div class="image-area w-full md:w-1/12">
                        <img src={{ asset('/ProductsImage/' . $product->image) }} alt="" class="">
                    </div>
                    <div class="text-area w-11/12 ml-0 md:ml-10 mt-2">
                        <h1 class="font-semibold text-lg ">{{ $product->name }}</h1>
                        <h1 class="font-bold text-md text-emerald-600">Quantity {{ $quantity }} Items</h1>
                    </div>
                </div>
            </div>
    
            <div class="amount-details mt-10 text-right" >
                <h1 class="font-semibold">Total Amount</h1>
                <h1 class="font-bold text-3xl mt-1 text-emerald-600">Rp. {{ number_format($totalPrice) }}</h1>
                <button type="submit" class="px-8 py-2 mt-8 rounded-md bg-cyan-950 font-semibold text-white text-lg">Checkout Now</button>
            </div>
        </form>
        
    </section>
@endsection