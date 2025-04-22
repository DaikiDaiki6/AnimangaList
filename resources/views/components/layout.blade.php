<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AniMangaList</title>
    @vite(['resources/js/app.js'])
</head>

<body class="bg-black text-white">
    <div>
        <nav class="bg-white/12 text-lg font-bold hover:border-blue-600 hover:border-b transition-colors duration-300">
            <div class="flex justify-between items-center px-6">
                <!-- Left Side: Logo Anime and Manga -->
                 <div class="flex space-x-4">
                    <x-navbar-name href="/home">
                        <img src="{{ asset('storage/Test Pics/AniMangaList.png') }}" alt="" width="200">
                    </x-navbar-name>
                    <div class="my-auto space-x-4">
                        <x-navbar-name href="/filter/anime">Anime</x-navbar-name>
                        <x-navbar-name href="/filter/manga">Manga</x-navbar-name>
                        <x-navbar-name href="/people">People</x-navbar-name>
                    </div> 
                 </div>

                <!-- Right Side: Login and Refgister or Profile-->
                <div class="flex my-auto">
                    @auth
                        <div class="my-auto space-x-4">
                            <x-navbar-name href="/user/edit">Edit Profile</x-navbar-name>
                            <x-navbar-name href="/logout">Log Out</x-navbar-name>
                            <x-navbar-name href="/profile">{{$user->name}}</x-navbar-name>
                            <x-navbar-name href="/profile">
                        </div>
                            <img src="{{$fixImagePath($user->profile_image)}}" alt="" width="42" class="inline rounded"> 
                        </x-navbar-name>
                    @endauth

                    @guest
                        <div class="my-auto space-x-4">
                            <x-navbar-name href="/login">Log In</x-navbar-name> 
                            <x-navbar-name href="/register">Register</x-navbar-name>
                        </div>
                        
                    @endguest
                </div>

            </div>
        </nav>
    </div>

    <main>
        {{ $slot }}
    </main>

</body>











</html>