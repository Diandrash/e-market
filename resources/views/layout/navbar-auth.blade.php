<section class="navbar-auth flex justify-between no-underline list-none px-0 md:px-8 py-4 bg-white fixed right-0 left-0 top-0 shadow-md z-50" id="navbar">
    <div class="nav-logo flex">
        <h1 class="font-bold text-xl text-cyan-950 ml-4 self-center">E-Market</h1>
    </div>
    <div class="nav-list absolute md:static flex flex-col md:flex-row h-dvh md:h-auto w-full md:w-auto justify-evenly md:justify-between text-lg self-auto md:self-center bg-white z-10 mt-12 md:mt-0 translate-x-full md:translate-x-0 text-center md:text-left" style="transition: all 1s ease">
        <li class="mx-10 text-cyan-950 hover:text-emerald-600"><a href="/home#hero">Home</a></li>
        <li class="mx-10 text-cyan-950 hover:text-emerald-600"><a href="/orders">Orders</a></li>
        <li class="mx-10 text-cyan-950 hover:text-emerald-600"><a href="/products">Products</a></li>
        <li class="ml-0 md:ml-10 text-cyan-950 hover:text-emerald-600"><a href="/myproducts">My Products</a></li>
        <div class="flex flex-col items-center">
            <button onclick="location.href='/logout'" class="w-48 block md:hidden px-10 rounded-lg py-2 bg-cyan-950 hover:bg-red-500 text-white">Logout</button>
        </div>
    </div>

    <div class="auth-section flex font-semibold">
        <button onclick="location.href='/logout'" class="hidden md:block px-10 rounded-lg py-2 bg-cyan-950 hover:bg-red-500 text-white">Logout</button>
    </div>

    <div class="hamburger-menu block md:hidden">
        <img src="/icons/bars-solid.svg" class="w-6 mr-6" alt="">
    </div>
</section>