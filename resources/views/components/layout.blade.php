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
                    <x-navbar-name href="/">
                        <img src="{{ asset('storage/Test Pics/AniMangaList.png') }}" alt="" width="200">
                    </x-navbar-name>
                    <div class="my-auto space-x-4">
                        <x-navbar-name href="/">Anime</x-navbar-name>
                        <x-navbar-name href="/">Manga</x-navbar-name>
                    </div> 
                 </div>

                <!-- Right Side: Login and Refgister or Profile-->
                <div class="flex space-x-4">
                    @auth
                        <x-navbar-name href="/">Edit Profile</x-navbar-name>
                        <x-navbar-name href="/">Log Out</x-navbar-name>

                        <x-navbar-name href="/">Name</x-navbar-name>
                        <x-navbar-name href="/">
                            <img src="" alt=""> 
                        </x-navbar-name>
                    @endauth

                    @guest
                        <x-navbar-name href="/">Log In</x-navbar-name> 
                        <x-navbar-name href="/">Register</x-navbar-name>
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