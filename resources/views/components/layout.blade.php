<!DOCTYPE html>
<html lang="en" x-data="{ isDark: localStorage.getItem('darkMode') === 'true', isMenu: false }" x-init="() => { $watch('isDark', value => localStorage.setItem('darkMode', value)) }" :class="{ 'dark': isDark }">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite('resources/css/app.css')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>DEV_JOBS | Find Your Dream Job In Software Development</title>
</head>

<body class="dark:bg-slate-900 text-gray-800 dark:text-font-color-dark">
    @if (!isset($excludeNav))
        <nav class=" @if (isset($absolute)) absolute @endif top-0 left-0 z-10 w-full flex justify-between items-center mb-4 dark:text-white">
            <a href="/" x-show="isDark"><img class="w-24 ml-6" src="{{ asset('images/logo.png') }}" alt="" class="logo" /></a>
            <a href="/" x-show="!isDark"><img class="w-24 ml-6" src="{{ asset('images/logo-dark.png') }}" alt="" class="logo" /></a>
            <ul class="flex space-x-6 mr-6 text-lg">
                @auth
                    {{-- <li @click="isMenu = !isMenu" class="cursor-pointer hover:text-primary text-xl"><i class="fa-solid fa-user"></i></li> --}}
                    <li @click="isMenu = !isMenu" class="flex items-center cursor-pointer hover:text-primary text-xl">
                        <i x-show="!isMenu" class="fa-solid fa-caret-down align-start mr-2"></i><i x-show="isMenu" class="fa-solid fa-caret-up align-start mr-2"></i></i><span class="font-bold uppercase">{{auth()->user()->name}}</span>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-primary"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-primary"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                @endauth
                <li>
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" class="sr-only peer" x-model="isDark">
                        <div class="flex items-center justify-between relative w-16 h-7 p-2 bg-gray-300 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-[35px] rtl:peer-checked:after:-translate-x-[35px] peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
                            <i class="fa-solid fa-moon text-white"></i>
                            <i class="fa-solid fa-sun text-black"></i>
                        </div>
                    </label>
                </li>
            </ul>
            <ul x-show="isMenu" class="absolute right-[175px] top-16 w-44 rounded-xl border-2 border-font-color-primary dark:border-font-color-dark bg-clip-padding backdrop-filter backdrop-blur-sm overflow-hidden">
                <li onclick="window.location.href = '/listings/create'" class="w-full h-16 p-4 hover:bg-primary hover:text-font-color-dark  border-b-2 border-font-color-primary dark:border-font-color-dark  cursor-pointer"><i class="fa-solid fa-pen-to-square w-[4px] mr-6"></i>Post Job</li>
                <li onclick="window.location.href = '/listings/manage'" class="w-full h-16 p-4 border-b-2 border-font-color-primary dark:border-font-color-dark hover:bg-primary hover:text-font-color-dark cursor-pointer">
                    <i class="fa-solid fa-gear w-[4px] mr-6"></i>Manage
                </li>
                <li>
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button class="flex items-center justify-start w-full h-16 p-4 hover:bg-primary hover:text-font-color-dark" type="submit">
                            <i class="fa-solid fa-door-closed w-[4px] mr-6"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    @endif
    <main>
        {{ $slot }}
    </main>
    @if (!isset($excludeFooter))
        <div class="flex justify-center w-full h-[1px] mt-36">
            <div class="w-full md:w-3/4 h-full bg-gray-300 dark:bg-gray-500"></div>
        </div>
        <footer class="w-full flex items-center justify-start font-bold h-36 opacity-90 justify-center">
            <p>Copyright &copy; 2022, All Rights reserved</p>
        </footer>
    @endif
    <x-flash-message/>
</body>

</html>