<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <title>ClubSwap | Find and Swap Golf Clubs</title>
    <link href="{{ secure_asset('output.css') }}" rel="stylesheet">

</head>

<body class="mb-48">
    <nav class="flex justify-between items-center">
        <a href="/" class="flex items-center">
            <img class="w-24 p-1" src="{{ secure_asset('images/logo.png') }}" alt="" class="logo" />
            <h2 class="lg:hidden text-5xl font-extrabold text-csdarkgreen">CLUB<span
                    class="font-extrabold lg:hidden text-cslightgreen">SWAP</span></h2>

        </a>

        <ul class="flex space-x-6 mr-6 text-lg">
            @auth
                <li>
                    <span class="font-bold hidden uppercase md:block lg:block">Welcome, {{ auth()->user()->name }}</span>
                </li>
                <li>
                    <a href="/listings/manage" class="hover:text-cslightgreen flex items-center">
                        <i
                            class="fa-solid fa-gear hidden md:block mr-1 text-3xl md:text-base sm:text-base lg:text-base"></i>
                        <span class="hidden md:block">Manage Posts</span>
                    </a>
                </li>
                <li>
                    <a href="/conversations" class="hover:text-cslightgreen flex items-center">
                        <i class="fa-solid fa-comment hidden md:block mr-1 text-3xl sm:text-base lg:text-base"></i>
                        <span class="hidden md:block">Inbox</span>
                    </a>
                </li>
                <li>
                    <form class="inline" method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="hover:text-cslightgreen flex items-center">
                            <i
                                class="fa-solid fa-door-closed hidden md:block mr-1 text-3xl md:text-base sm:text-base lg:text-base"></i>
                            <span class="hidden md:block">Logout</span>
                        </button>
                    </form>
                </li>
                <li>
                    <i class="fas fa-bars block md:hidden lg:hidden xl:hidden text-5xl cursor-pointer"></i>
                </li>
            @else
                <li>
                    <a href="/register" class="hover:text-cslightgreen flex items-center">
                        <i class="fa-solid fa-user-plus hidden md:block mr-1 text-3xl sm:text-base lg:text-base"></i>
                        <span class="hidden md:block">Register</span>
                    </a>
                </li>
                <li>
                    <a href="/login" class="hover:text-cslightgreen flex items-center">
                        <i
                            class="fa-solid fa-arrow-right-to-bracket hidden md:block mr-1 text-3xl sm:text-base lg:text-base"></i>
                        <span class="hidden md:block">Login</span>
                    </a>
                </li>
                <li>
                    <i class="fas fa-bars block md:hidden lg:hidden xl:hidden text-5xl cursor-pointer"></i>
                </li>
            @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>
    <footer
        class="fixed bottom-0 left-0 w-full hidden sm:flex items-center justify-start font-bold text-white h-24 mt-24 opacity-90 md:justify-center"
        style="background-image: linear-gradient(to right, rgba(3, 43, 3, 0.9), rgba(63, 209, 63, 0.9));">
        <p class="ml-2">Copyright &copy; 2023, All Rights reserved</p>
        <a href="/listings/create"
            class="absolute top-1/2 right-10 transform -translate-y-1/2 bg-black text-white py-2 px-5">Post
            Club</a>
    </footer>


    <x-flash-message />
</body>

</html>
