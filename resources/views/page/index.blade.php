<x-layout>
    <x-header>Home</x-header>
    <x-divider/>
    <x-button-create/>

    @foreach($animanga as $likes)
    <a href="/animanga/{{$likes->id}}">
        <x-panel class="flex flex-col h-full">
            <img src="{{$likes->cover_image}}" class="rounded-xl mx-auto object-cover">
            <div class="flex flex-col justify-center items-center mt-3 flex-grow">
                <h1 class="text-2xl font-bold text-center w-full">{{$likes->title}}</h1>
                <p class="text-center">{{$likes->studio}}</p>
                <p>{{$likes->type}}</p>
                @if($likes->type === 'Anime')
                    <p>Episodes: {{$likes->ep_count}}</p>
                @else
                    <p>Chapters: {{$likes->ep_count}}</p>
                @endif
            </div>
            <x-button-like :likes="$likes"></x-button-like>
        </x-panel>
    </a>
    @endforeach
</x-layout>