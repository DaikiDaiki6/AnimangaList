<x-layout>
    <x-header>{{ $users->name }}'s Profile</x-header>
    <x-divider/>

    <x-panel>
        <img src="{{asset($users->profile_image)}}" width="300" class="rounded-4xl mx-auto">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold">{{$users->name}}</h1>
            <p>{{$users->email}}</p>
            <h1 class="text-xl font-bold">Role</h1>
            @if($users->admin === true)
                <p>{{$users->name}} is an admin.</p>
            @else
                <p>{{$users->name}} is a user.</p>
            @endif
        </div>
    </x-panel>
    
    <x-panel>
        <h1 class="text-3xl text-center font-bold mb-6">{{$users->name}}'s Likes</h1>
    
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 justify-items-center">
            @foreach($users->animangalists as $likes)
                <a href="/animanga/{{$likes->id}}" class="w-full max-w-xs">
                    <x-panel class="flex flex-col h-full">
                        <img src="{{ asset($likes->cover_image) }}" width="150" class="rounded-xl mx-auto h-40 object-cover">
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
        </div>
    </x-panel>
    

</x-layout>