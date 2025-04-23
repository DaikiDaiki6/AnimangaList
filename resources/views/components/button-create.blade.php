@if ($user->admin === true)
<div class="flex justify-end mx-4">
    <a href="/create/animanga" class="bg-white/12 rounded-2xl hover:bg-white/20 border border-transparent hover:border-blue-600 transition-colors duration-300 font-medium p-4">
        Create Anime/Manga
    </a>
</div>
@endif