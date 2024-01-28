@extends('layout.index')

@section('container')
    <section id="login" class="pt-[4rem]">
        <div class="content-area flex mb-10">
            <div class="form-area w-full md:w-6/12 bg-gray-100">
                <div class="content-area ml-10 mt-7 md:mt-4">
                    <div class="title-text">
                        <h1 class="text-2xl font-semibold">Register an New Account</h1>
                    </div>
                    <form action="/register" method="post">
                        @csrf
                        <div class="form-input mt-5">
                            <label for="name" class="text-lg font-semibold">Name</label><br>
                            <input required type="text" class="w-10/12 h-14 mt-3 font-semibold px-5" name="name" id="name" placeholder="John Doe">
                        </div>
                        <div class="form-input mt-5">
                            <label for="email" class="text-lg font-semibold">Email</label><br>
                            <input required type="text" class="w-10/12 h-14 mt-3 font-semibold px-5" name="email" id="email" placeholder="johndoe@example.com">
                        </div>
                        <div class="form-input mt-5">
                            <label for="password" class="text-lg font-semibold">Password</label><br>
                            <input required type="password" class="w-10/12 h-14 mt-3 font-semibold px-5" name="password" id="password" placeholder="**********">
                        </div>
                        <div class="form-input mt-5">
                            <label for="city" class="text-lg font-semibold">Your City</label><br>
                            <input required type="text" class="w-10/12 h-14 mt-3 font-semibold px-5" name="city" id="city" placeholder="Kabupaten Klaten">
                        </div>
                        <div class="form-input mt-5">
                            <label for="province" class="text-lg font-semibold">Your Province</label><br>
                            <input type="text" class="w-10/12 h-14 mt-3 font-semibold px-5" name="province" id="province" placeholder="Central Java">
                        </div>


                        <button type="submit" class="mt-24 w-10/12 h-14 bg-cyan-950 font-semibold text-white">Register Now</button>
                    </form>
                    <h1 class="font-lg text-md mt-3">Already Have an Account? <a href="/login" class="list-none underline text-emerald-600">Sign In Now!</a></h1>
                </div>
            </div>
            <div class="image-area w-6/12 bg-cyan-950 hidden md:flex justify-center">
                <img src="/img/register.png" class="w-9/12 mt-14" alt="">
            </div>
        </div>
    </section>
@endsection