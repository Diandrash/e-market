@extends('layout.index')

@section('container')
    <section class="orders mx-10 pt-20 md:pt-24 pb-16">
        <div class="header-text flex justify-between">
            <h1 class="text-xl md:text-2xl font-semibold">
                My Orders Page</h1>
        </div>

        <div class="orders area mt-7">
            
            @foreach ($orders as $order)
                <div class="order-card p-4 bg-white 
                shadow-xl rounded-lg mb-5">
                    <div class="section-title flex 
                    justify-between flex-wrap">
                        <h1 class="font-medium text-sm">
                            Seller Name : <span class="font-bold">
                                {{ $order->product->seller->name }}
                            </span></h1>
                        @if ($order->status == 0)
                            <h1 class="font-bold text-sm md:text-base
                             text-orange-600">On Proccess</h1>
                        @endif
                        @if ($order->status == 1)
                            <h1 class="font-bold text-sm md:text-base
                             text-cyan-950">Product Delivered</h1>
                        @endif
                    </div>
                    <div class="product-area flex flex-wrap
                     justify-between mt-2">
                        <div class="product-details flex
                         flex-wrap">
                            <img 
                            src={{ asset('/ProductsImage/' . 
                            $order->product->image) }} 
                            alt="product image" 
                            class="w-32 shadow-md">
                            <div class="text-area ml-0 md:ml-4">
                                <h1 class="font-semibold 
                                text-base md:text-lg mt-3 
                                md:mt-0">{{ $order->product->name }}
                            </h1>
                                <h2 class="font-medium text-sm opacity-80
                                mt-4">Order on
                                 {{ date_format($order->created_at, "d F Y")
                                  }}
                                </h2>
                                <button class="px-8 py-2 rounded-md 
                                bg-cyan-950 text-white font-semibold text-sm
                                 mt-6 cursor-pointer "
                                  onclick=
                                  "location.href='/products/{{ $order->product->id }}'">
                                  Buy Again</button>
                            </div>
                        </div>
                        <div class="product price text-left md:text-right mt-4 
                        md:mt-0">
                            <h1 class="font-semibold text-sm 
                            text-cyan-950">Quantity Items : {{ $order->quantity }}
                        </h1>
                            <h1 class="font-medium text-sm opacity-50 mt-1 md:mt-10">
                                Total Amount</h1>
                            <h1 class="font-bold text-2xl md:text-3xl text-emerald-600">
                                Rp. {{ number_format($order->total_price) }}</h1>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection