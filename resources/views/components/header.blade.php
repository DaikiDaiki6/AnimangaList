<div class="relative w-full py-10 mt-1">
    <!-- Background image -->
    <div 
        class="absolute inset-0 bg-cover bg-center hover:opacity-10 transition-opacity duration-1000 opacity-20"
        style="background-image: url('{{ asset('storage/Test Pics/header.jpg') }}');">
    </div>

    <!-- Content -->
    <div class="relative z-10">
        <h1 class="font-bold text-4xl text-center pt-4 text-white">
            {{ $slot }}
        </h1>
    </div>
</div>