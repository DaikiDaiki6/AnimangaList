<x-layout>
    <x-header>{{$animanga->title}}</x-header>
    <x-divider/>

    <x-panel>
        <img src="{{$animanga->cover_image}}" width="500" class="rounded-4xl mx-auto">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold">{{ $animanga->title }}</h1>
            <h1 class="text-xl font-bold">{{$animanga->studio}}</h1>
            <p>{{$animanga->synopsis}}</p>
            <h1 class="text-xl font-bold">{{$animanga->type}}</h1>
            @if($animanga->type === 'Anime')
                <p>Episode: {{$animanga->ep_count}}</p>
            @else
                <p>Chapter: {{$animanga->ep_count}}</p>
            @endif
        </div>
        <x-button-like :likes="$animanga"></x-button-like>
    </x-panel>

</x-layout>