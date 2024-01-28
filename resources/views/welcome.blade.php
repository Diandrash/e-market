@extends('layout.index')

@section('container')
    
    <section id="hero" class="hero">
        @auth
            <h1>Welcome {{ auth()->user()->name }}</h1>
        @endauth
        <div class="content-area flex flex-wrap justify-between mx-3 md:mx-24 h-screen pt-16">
            <div class="text-area w-full md:w-6/12  ml-10">
                <h1 class="text-3xl md:text-5xl font-semibold mt-16 md:mt-32">Find Your Favorites, Anytime, Anywhere.</h1>
                <button class="px-8 py-3 bg-emerald-600 font-semibold text-white text-sm md:text-base mt-8 rounded-lg">
                    Shopping Now!
                </button>
            </div>
            <div class="image-area w-full md:w-5/12 ">
                <img src="/img/landing-page.png" alt="">
            </div>
        </div>
    </section>

<section id="about" class="about mt-8 pb-24 pt-20">
        <div class="about-title text-center font-semibold text-4xl mb-10 text-cyan-950">
            About Us
        </div>
        <div class="content-area flex flex-wrap mx-10 md:mx-32 ">
            <div class="logo-area w-full md:w-5/12 text-center bg-white shadow-md py-16 md:py-36 px-10 md:px-10">
                <h1 class="font-bold text-5xl md:text-7xl text-cyan-950">E-Market</h1>
            </div>
            <div class="text-area w-full md:w-6/12 mt-5 md:mt-0 ml-0 md:ml-6 text-left font-normal">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente libero possimus cum quisquam molestiae, omnis quam impedit cumque vero magni laborum rerum in assumenda, accusantium animi iste earum molestias amet provident atque a voluptatem. Autem nisi cum sapiente distinctio praesentium dicta nam, deleniti magnam, omnis, asperiores necessitatibus dolores vel. Repudiandae consectetur accusamus, fugit quasi fugiat ad dicta facilis sed. Aliquid dolorem a pariatur rem voluptate harum reiciendis exercitationem labore eligendi quibusdam praesentium, libero consequatur aspernatur dolore natus necessitatibus mollitia, iste qui sunt porro omnis, odit deserunt. Consequatur distinctio itaque ut deserunt illum. Aliquid necessitatibus facilis fugit iure est quidem accusantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, doloribus. Lorem ipsum dolor sit amet.
            </div>
        </div>
    </section>
@endsection