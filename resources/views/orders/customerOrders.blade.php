@extends('layout.index')

@section('container')
    <section class="orders mx-10 pt-20 md:pt-6 pb-16">
        <div class="header-text flex justify-between">
            <h1 class="text-2xl font-semibold">Orders from Customer</h1>
        </div>

        <div class="orders area mt-7">
            
            @foreach ($orders as $order)
                <div class="order-card p-4 bg-white shadow-xl rounded-lg mb-5">
                    <div class="section-title flex justify-between flex-wrap">
                        <h1 class="font-medium text-sm">Buyer Name : <span class="font-bold">{{ $order->user->name }}</span></h1>
                        @if ($order->status == 0)
                            <h1 class="font-bold text-base text-orange-600">On Proccess</h1>
                        @endif
                        @if ($order->status == 1)
                            <h1 class="font-bold text-base text-cyan-950">Product Delivered</h1>
                        @endif
                    </div>
                    <div class="product-area flex flex-wrap justify-between mt-2">
                        <div class="product-details flex">
                            <img src={{ asset('/ProductsImage/' . $order->product->image) }} alt="product image" class="w-32 shadow-md">
                            <div class="text-area ml-4">
                                <h1 class="font-semibold text-base md:text-lg">{{ $order->product->name }}</h1>
                                {{-- <h2 class="font-medium text-sm opacity-80 mt-4">Order on 16 January 2023</h2> --}}
                                <h1 class="font-semibold text-xs md:text-sm text-cyan-950">Quantity Items : {{ $order->quantity }}</h1>

                            </div>
                        </div>
                        <div class="product price text-left md:text-right">
                            <h1 class="font-medium text-sm opacity-50 mt-10">Total Amount</h1>
                            <h1 class="font-bold text-2xl md:text-3xl text-emerald-600 ">Rp. {{ number_format($order->total_price) }}</h1>
                        </div>
                    </div>
                    <div class="customer-details flex flex-wrap justify-between mt-5">
                        <div class="text-area">
                            <h1 class="font-semibold text-xs md:text-sm mb-3">Order on {{ date_format($order->created_at, 'd F Y') }}</h1>
                            <h1 class="font-semibold text-xs md:text-sm mb-3">Order by {{ $order->user->name }}</h1>
                            <h1 class="font-semibold text-xs md:text-sm mb-3">Address : {{ $order->address}}</h1>
                        </div>
                        @if ($order->status == 0)
                            <form action="/ordersfromcustomer" method="post">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="order_id" value="{{ $order->id}}">
                                <input type="hidden" name="status" value="1">
                                <button type="submit" class="px-8 md:px-10 h-8 md:h-10 bg-emerald-600 shadow-lg font-semibold text-sm md:text-base text-white rounded-md self-center">Deliver it Now</button>
                            </form>
                        @endif
                        @if ($order->status == 1)
                            <button type="submit" disabled class="px-10 h-10 bg-emerald-600 shadow-lg font-semibold text-base text-white rounded-md self-center opacity-30">Deliver it Now</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection