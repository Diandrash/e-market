@extends('layout.index')

@section('container')
    <section class="product-details pt-24 mx-4 md:mx-10 pb-24">
        <div class="product-area flex flex-wrap">
            <div class="product-image">
                <img src={{ asset('/ProductsImage/' . $product->image) }}
                 class="w-[27rem] h-[27rem]" alt="">
            </div>
            <div class="product-detail ml-0 md:ml-10">
                <div class="title h-20 md:h-24 w-10/12 font-bold text-2xl
                 md:text-3xl mt-4 ">
                    {{ $product->name }}
                </div>
                <div class="product-price font-black text-3xl md:text-4xl
                 text-emerald-600">
                    <h1>Rp {{ number_format($product->price) }}</h1>
                </div>
                
                <div class="order-area action-area mt-9 md:mt-36">
                    <div class="action-area">
                        <div class="flex gap-4">
                            <div class="items rounded-lg py-2 px-3
                             bg-amber-400 hover:bg-amber-200 flex self-center
                             items-center cursor-pointer" 
                             onclick="location.href='/myproducts/{{ $product->id }}/edit'">
                                <img src="/icons/pencil-solid.svg" alt="" 
                                class="w-5">
                                <h1 class="font-bold text-base md:text-lg ml-3 
                                text-white">Edit Product</h1>
                            </div>
                            <form action="/myproducts/{{$product->id}}/delete" 
                                method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="items rounded-lg py-2 px-3
                                 bg-red-600 hover:bg-red-400 flex self-center
                                  items-center cursor-pointer"
                                  onclick="confirm('Sure to Delete this Product?')">
                                    <img src="/icons/trash-solid.svg" alt="" class="w-4">
                                    <h1 class="font-bold text-base md:text-lg ml-3
                                     text-white">Delete Product</h1>
                                </button>
                            </form>
                        </div>
                    </div>
                    <form action="" method="post">
                        <button type="submit" disabled class="w-full h-14 mt-8 bg-emerald-600
                         font-semibold text-white text-xl rounded-lg disabled opacity-30">
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
                        <h1 class="font-semibold text-xl">
                            {{ $product->seller->name }}</h1>
                        <h2 class="font-medium text-base opacity-60">
                            {{ $product->seller->city }}</h2>
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