@extends('layout.index')

@section('container')
    <section id="products" class="products mx-4 md:mx-10 pt-20">
        <div class="header-text flex justify-between">
            <h1 class="text-2xl font-semibold">Create New Product</h1>
        </div>

        <div class="main-area pb-16 mt-4">
            <form action="/myproducts/store" method="post" 
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="seller_id" 
                value="{{ auth()->user()->id }}">
                <div class="form-input mt-8">
                    <label for="name" class="text-xl font-semibold">
                        Product Name</label><br>
                    <input type="text" class="pl-3 w-full md:w-8/12 h-14 
                    mt-3 font-semibold" name="name" id="name" 
                    placeholder="Keyboard Mechanical Gamen Titan Elite III">
                </div>
                <div class="form-input mt-8">
                    <label for="price" class="text-xl font-semibold">
                        Product Price</label><br>
                    <input type="number" class="px-3 w-full md:w-8/12 h-14 mt-3 
                    font-semibold" name="price" id="price" placeholder="100999">
                </div>
                <div class="form-input mt-8">
                    <select class="px-3 w-full md:w-8/12 h-14 mt-3 font-semibold"
                     name="category_id" id="category">
                        <option value="0">Select Category</option>
                        <option value="1">Electronics</option>
                        <option value="2">Fashion</option>
                    </select>
                </div>
                <div class="form-input mt-8">
                    <label for="description" class="text-xl font-semibold">
                        Product description</label><br>
                        <textarea name="description" id="description" cols="30"
                         rows="10" class="w-full md:w-8/12 mt-3 font-semibold p-3"
                          placeholder="Your description about Product here">
                        </textarea>
                </div>
                <div class="form-input mt-8">
                    <label for="image" class="text-xl font-semibold">
                        Product Image</label><br>
                    <input type="file" class=" w-full md:w-8/12 py-2 mt-3 
                    font-semibold bg-white text-xl" name="image" id="image">
                </div>
                
                <button type="submit" class="mt-16 w-full md:w-8/12 py-3 bg-emerald-600
                 font-semibold text-white text-base">
                    Create Now
                </button>
            </form>
        </div>
    </section>
@endsection