<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Vacancies</title>
</head>

<body class="font-sans antialiased ">
    <div class="h-screen grid grid-rows-[auto_1fr_auto]">

        <header class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
            <div
                class="container relative flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2 lg:px-0">
                <div class="flex items-center justify-start w-1/4 h-full pr-4">
                    <a href="#_" class="inline-block py-4 md:py-0">
                        <span class="p-1 text-xl font-black leading-none text-gray-900">tails.</span>
                    </a>
                </div>
                <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 md:absolute lg:text-base md:bg-transparent md:p-0 md:relative md:flex"
                    :class="{ 'flex fixed': showMenu, 'hidden': !showMenu }">
                    <div
                        class="flex-col w-full h-auto overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                        <a href="#_"
                            class="inline-flex items-center block w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden">tails<span
                                class="text-indigo-600">.</span></a>
                        <div
                            class="flex flex-col items-start justify-center w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left :text-indigo-600 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Home</a>
                            <a href="{{ route('vacancies') }}"
                                class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 text-indigo-600 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Vacancies</a>
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">Blog</a>
                            <a href="#_"
                                class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">Contact</a>
                        </div>
                        @if (Route::has('login'))
                            <nav class="flex justify-end flex-1 -mx-3">
                                @auth
                                    <a href="{{ url('/profile') }}"
                                        class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">
                                        {{ __('Profile') }}
                                    </a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </div>
                </div>
                <div @click="showMenu = !showMenu"
                    class="absolute right-0 flex flex-col items-center items-end justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </div>
            </div>
        </header>

        <section class="h-auto bg-white">
            <h1 class="mb-6 text-3xl font-bold">Поиск вакансий</h1>
            <div class="mb-6">
                <form class="flex space-x-4">
                    <input type="text"
                        class="flex-grow p-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="Введите ключевые слова...">
                    <select
                        class="p-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach ($positions as $position)
                            <option name="position_id" value="{{ $position->id }}" class="dark:bg-gray-800 dark:text-white"></option>
                        @endforeach
                    </select>
                    <select
                        class="p-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach ($cities as $city)
                            <option name="city_id" value="{{ $city->id }}" class="dark:bg-gray-800 dark:text-white"></option>
                        @endforeach
                    </select>
                    <select
                        class="p-2 text-white bg-gray-800 border border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach ($countries as $country)
                            <option name="country_id" value="{{ $country->id }}" class="dark:bg-gray-800 dark:text-white"></option>
                        @endforeach
                    </select>
                    <button type="submit"
                        class="p-2 font-semibold text-white bg-indigo-500 rounded-md hover:bg-indigo-600">Найти</button>
                </form>
            </div>

            <div class="space-y-4">
                <div class="p-4 bg-gray-800 rounded-md shadow-md">
                    <h2 class="text-xl font-bold">Frontend Developer</h2>
                    <p class="text-gray-400">Компания: Tech Solutions</p>
                    <p class="text-gray-400">Город: Москва</p>
                    <p class="mt-2">Мы ищем талантливого Frontend разработчика с опытом работы с React и Tailwind
                        CSS...</p>
                    <a href="#" class="block mt-2 text-indigo-400 hover:underline">Подробнее</a>
                </div>
                <div class="p-4 bg-gray-800 rounded-md shadow-md">
                    <h2 class="text-xl font-bold">Backend Developer</h2>
                    <p class="text-gray-400">Компания: Code Factory</p>
                    <p class="text-gray-400">Город: Санкт-Петербург</p>
                    <p class="mt-2">Мы ищем опытного Backend разработчика с опытом работы с Laravel и MySQL...</p>
                    <a href="#" class="block mt-2 text-indigo-400 hover:underline">Подробнее</a>
                </div>
                <div class="p-4 bg-gray-800 rounded-md shadow-md">
                    <h2 class="text-xl font-bold">Data Scientist</h2>
                    <p class="text-gray-400">Компания: Data Insights</p>
                    <p class="text-gray-400">Город: Новосибирск</p>
                    <p class="mt-2">Мы ищем Data Scientist с опытом работы с Python и машинным обучением...</p>
                    <a href="#" class="block mt-2 text-indigo-400 hover:underline">Подробнее</a>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
