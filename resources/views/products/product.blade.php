@extends('layout.index')

@section('container')
    <section class="product-details pt-24 mx-4 md:mx-10 pb-24">
        <div class="product-area flex flex-wrap">
            <div class="product-image">
                <img src={{ asset('/ProductsImage/' . $product->image) }} class="w-[27rem] h-[27rem]" alt="">
            </div>
            <div class="product-detail ml-0 md:ml-10">
                <div class="title h-20 md:h-24 w-10/12 font-bold text-2xl md:text-3xl mt-4 ">
                    {{ $product->name }}
                </div>
                <div class="product-price font-black text-3xl md:text-4xl text-emerald-600 mt-3 md:mt-0">
                    @php
                        $price = $product->price
                    @endphp
                    <h1>Rp. {{ number_format($price) }}</h1>
                </div>

                <div class="order-area mt-10 md:mt-40">
                    <form action="/products/{{ $product->id }}/checkout" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <label for="quantity" class="font-semibold text-base">Quantity</label>
                        <input type="number" min="1" class="w-12 h-8 font-black ml-3 pl-5" value="1" name="quantity" id="quantity">
                        @auth
                            <button type="submit" class="w-full h-14 mt-8 bg-emerald-600 font-semibold text-white text-xl rounded-lg">
                        @endauth
                        @guest
                        <button disabled class="w-full h-14 mt-8 bg-emerald-600 font-semibold text-white text-xl rounded-lg opacity-30">
                        @endguest
                            Buy Now
                        </button>
                    </form>
                </div>
            </div>
            
        </div>
        <div class="profile-area mt-14">
            <div class="content flex justify-between bg-white rounded-lg shadow-sm w-full p-4">
                <div class="area-left flex">
                    <img src="/img/profile.png" class="h-14" alt="">
                    <div class="seller-information ml-3">
                        <h1 class="font-semibold text-xl">{{ $product->seller->name }}</h1>
                        <h2 class="font-medium text-base opacity-60">{{ $product->seller->city }}</h2>
                    </div>
                </div>
                <div class="area-right self-center font-bold ">
                    <h1>{{ $product->seller->province }}</h1>
                </div>
            </div>
        </div>
        <div class="product-description-area mt-8 md:mt-16">
            <h1 class="font-semibold text-xl">Product Description :</h1>
            <p class="font-medium text-base">
                {{ $product->description }}
            </p>
        </div>
    </section>
@endsection