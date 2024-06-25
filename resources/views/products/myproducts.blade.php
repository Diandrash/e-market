@extends('layout.index')

@section('container')
    <section id="products" class="products mx-4 md:mx-10 pt-24">
        <div class="header-text flex justify-between">
            <h1 class="text-xl md:text-2xl font-semibold">
                All My Products</h1>
            <button class="px-4 py-2 font-semibold text-white text-xs 
            md:text-base bg-emerald-600 rounded-md cursor-pointer" 
            onclick="location.href='/ordersfromcustomer'">
                Orders from Customer
            </button>
        </div>

        <div class="products-area pb-10 mt-4 ml-3 md:ml-0">
            <div class="cards flex flex-wrap gap-3">
                <div class="card-register flex justify-center mt-3 w-40
                 md:w-56 h-[26rem;] md:h-[26.4rem;] bg-white
                  hover:bg-slate-100 shadow-lg 
                border-dotted border-2 border-emerald-600" 
                onclick="location.href='/myproducts/create'">
                    <div class="center-area text-center self-center flex 
                    flex-col items-center">
                        <img src="/icons/plus-solid.svg" alt="" class="w-8 ">
                        <h1 class="text-sm md:text-base font-bold mt-10">
                            Add New Product</h1>
                    </div>
                </div>


                @foreach ($products as $product)
                    <div class="card mt-3 w-40 md:w-56 bg-white
                     hover:bg-slate-200 shadow-lg" >
                        <div class="image-area ">
                            <img src={{ asset('/ProductsImage/' . $product->image) }}
                             class="w-56 h-48 " alt="">
                        </div>
                        <div class="text-area mx-3">
                            <div class="title h-14 text-sm md:text-base 
                            font-semibold mt-2">
                            {{ $product->name }}
                            </div>
                            <div class="price font-bold text-base md:text-xl
                             text-emerald-600 mt-3">
                                @php
                                    $price = $product->price;
                                    
                                @endphp

                                Rp. {{ number_format($price) }}
                            </div>
                            <div class="place text-xs md:text-sm opacity-70 pb-4 
                            font-medium mt-5 ">
                                {{ $product->seller->city }}
                            </div>
                        </div>

                        <div class="action-area mx-3 mt-3 pb-6">
                            <div class="flex gap-2">
                                <div class="items rounded-lg p-2 bg-emerald-600
                                 hover:bg-emerald-400 flex self-center items-center">
                                    <img src="/icons/eye-solid.svg" alt="" class="w-5" 
                                    onclick="location.href='/myproducts/{{ $product->id }}'">
                                </div>
                                <div class="items rounded-lg p-2 bg-amber-400 hover:bg-amber-200 
                                flex self-center items-center"  
                                onclick="location.href='/myproducts/{{ $product->id }}/edit'">
                                    <img src="/icons/pencil-solid.svg" alt="" class="w-5">
                                </div>

                                <form action="myproducts/{{ $product->id }}/delete" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                    onclick="confirm('Sure to Delete this Product?')" 
                                    class="items rounded-lg p-2 bg-red-600 hover:bg-red-400 
                                    flex self-center items-center">
                                        <img src="/icons/trash-solid.svg" alt="" 
                                        class="w-4">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
@endsection