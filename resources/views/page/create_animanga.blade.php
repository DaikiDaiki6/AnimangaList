<x-layout>
    <x-header>Create Anime/Manga</x-header>
    <x-divider/>

    <x-panel>
        <form method="POST" action="/create/animanga" enctype="multipart/form-data">
            @csrf
            <x-label>Title</x-label>
            <x-input type="text" name="title"></x-input>

            <x-label>Studio</x-label>
            <x-input type="text" name="studio"></x-input>

            <x-label>Chapters/Episode</x-label>
            <x-input type="number" name="ep_count"></x-input>
            
            <div class="flex flex-col space-y-3">
            <x-label>Synopsis</x-label>
            <textarea name="synopsis" row="4"  class="bg-white/12 rounded-2xl border border-white/15 p-4"> </textarea>             
        
            <x-label>Type</x-label>
            <select name="type" class="bg-white/12 rounded-2xl border border-white/15 p-4">
                <option value="Anime">Anime</option>
                <option value="Manga">Manga</option>
            </select>

            <x-label>Cover Image</x-label>
            <x-input type="file" name="cover_image" accept=".jpg,.jpeg,.png" placeholder="Choose File"></x-input>
            </div>

            <x-button>Create</x-button>
        </form>
    </x-panel>
</x-layout>