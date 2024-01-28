@extends('layout.index')

@section('container')
    <section id="login" class="pt-[4.5rem]">
        <div class="content-area flex h-screen md:h-auto text-white md:text-black">
            <div class="image-area w-6/12 bg-emerald-600 hidden md:flex justify-center">
                <img src="/img/login.png" class="w-9/12 mt-14" alt="">
            </div>
            <div class="form-area w-full md:w-6/12 bg-emerald-600 md:bg-gray-100">
                <div class="content-area mx-5 mt-4">
                    <div class="title-text">
                        <h1 class="text-2xl font-semibold">Sign In into your Account</h1>
                    </div>
                    <form action="/login" method="post">
                        @csrf
                        <div class="form-input mt-16 md:mt-8">
                            <label for="email" class="text-xl font-semibold">Your Email</label><br>
                            <input type="text" class="pl-3 w-full md:w-10/12 h-14 mt-3 font-semibold" name="email" id="email" placeholder="johndoe@gmail.com">
                        </div>
                        <div class="form-input mt-8">
                            <label for="password" class="text-xl font-semibold">Password</label><br>
                            <input type="password" class="pl-3 w-full md:w-10/12 h-14 mt-3 font-semibold" name="password" id="password" placeholder="********">
                        </div>

                        <button type="submit" class="mt-24 w-full md:w-10/12 h-14 bg-cyan-950 font-semibold text-white">Login Now</button>
                        <h1 class="font-lg text-md mt-3">Not Have an Account? <a href="/register" class="list-none underline text-black md:text-emerald-600">Sign Up Now!</a></h1>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection