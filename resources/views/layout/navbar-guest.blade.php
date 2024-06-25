<section class="navbar-guest flex justify-between no-underline list-none px-0 md:px-8 
py-6 md:py-4 bg-white fixed right-0 left-0 top-0 z-50" id="navbar">
    <div class="nav-logo flex">
        <h1 class="font-bold text-xl text-cyan-950 ml-4 self-center">E-Market</h1>
    </div>
    <div  class="nav-list flex flex-col md:flex-row absolute md:static h-dvh w-full 
    md:w-auto md:h-full justify-evenly md:justify-between text-lg self-auto md:self-center
     bg-white z-10 mt-12 md:mt-0 text-center md:text-auto translate-x-full md:translate-x-0 " 
     style="transition: all 1s ease">
        <li class="mx-10 text-cyan-950 hover:text-emerald-600"><a href="/home#hero">Home</a></li>
        <li class="mx-10 text-cyan-950 hover:text-emerald-600"><a href="/home#about">About</a></li>
        <li class="mx-10 text-cyan-950 hover:text-emerald-600"><a href="/products">Products</a></li>
        <li class="ml-0 md:ml-10 text-cyan-950 opacity-50"><a href="">My Products</a></li>
        <div class="auth-section flex flex-col items-center ">
            <button class="px-10 rounded-lg py-2 bg-emerald-600 hover:bg-emerald-400 mr-0 md:mr-3
             w-48 md:w-auto  text-white md:hidden block" onclick="location.href='/login'">Sign In</button>
            <button class="px-10 rounded-lg py-2 bg-cyan-950 hover:bg-cyan-900 mr-0 md:mr-3 w-48
             md:w-auto mt-5 text-white md:hidden block" onclick="location.href='/register'">Sign Up</button>
        </div>
    </div>

    <div class="auth-section flex font-semibold">
        <button class="px-10 rounded-lg py-2 bg-emerald-600 hover:bg-emerald-400 mr-3
         text-white hidden md:block" onclick="location.href='/login'">Sign In</button>
        <button class="px-10 rounded-lg py-2 bg-cyan-950 hover:bg-cyan-900 text-white
         hidden md:block" onclick="location.href='/register'">Sign Up</button>
    </div>

    <div class="hamburger-menu block md:hidden mr-6">
        <img src="/icons/bars-solid.svg" class="w-6" alt="">
    </div>

</section>