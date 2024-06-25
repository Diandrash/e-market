@extends('layout.index')

@section('container')
    <section id="products" class="products mx-4 md:mx-10 pt-20">
        <div class="header-navigation flex justify-between">
            <div class="category-area self-center hidden md:block">
                <form action="/products/category" method="post">
                    @csrf
                    <select onchange="this.form.submit()" name="category" id="category"
                     class="w-48 py-3 font-semibold bg-transparent text-lg">
                        <option value="0" selected disabled hidden>Category</option>
                        <option value="1">Electronics</option>
                        <option value="2">Fashion</option>
                    </select>
                </form>
            </div>

            <div class="search-box flex bg-white self-center">
                <form action="/products/search" method="post">
                    @csrf
                    <div class="relative flex">
                        <img src="/icons/search.svg" alt="" class="w-5 md:w-6 ml-3 
                        absolute self-center">
                        <input type="text" class="h-10 w-80 md:w-[56rem] font-semibold 
                        pl-14 py-6 rounded-lg text-sm md:text-base" name="search" id="search" 
                        placeholder="Search Your Favourite Products Here...">
                    </div>
                </form>
            </div>
            <div class="order-area self-center cursor-pointer" onclick="location.href='/orders'">
                {{-- halo --}}
                <img class="w-7 " src="/icons/cart-shopping-solid.svg" alt="icon">
            </div>
        </div>
        <div class="category-area self-center block md:hidden mt-2">
            <form action="/products/category" method="post">
                @csrf
                <select onchange="this.form.submit()" name="category" id="category" 
                class="w-36 md:w-48 py-3 font-semibold bg-transparent text-base md:text-lg">
                    <option value="0" selected disabled hidden>Category</option>
                    <option value="1">Electronics</option>
                    <option value="2">Fashion</option>
                </select>
            </form>
        </div>

        <div class="products-area pb-10 mt-4">
            <div class="cards flex flex-wrap gap-3 ml-3 md:ml-0">
                @foreach ($products as $product)
                <div class="card mt-3 w-40 md:w-56 bg-white hover:bg-slate-200 shadow-lg 
                cursor-pointer" onclick="location.href='/products/{{ $product->id }}'">
                    <div class="image-area ">
                        <img src={{ asset('/ProductsImage/'. $product->image) }}
                         class="w-40 md:w-56 h-48" alt="">
                    </div>
                    <div class="text-area mx-3">
                        <div class="title h-14 text-sm md:text-base font-semibold mt-2">
                           {{ $product->name }}
                        </div>
                        <div class="price font-bold text-lg md:text-xl text-emerald-600 mt-3">
                            @php
                                $price = $product->price
                            @endphp
                            Rp. {{ number_format($price) }}
                        </div>
                        <div class="place text-xs md:text-sm opacity-70 pb-4 font-medium mt-5 ">
                            {{ $product->seller->city }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection