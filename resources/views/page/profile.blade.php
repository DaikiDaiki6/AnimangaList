<x-layout>
    <x-header>{{ $user->name }}'s Profile</x-header>
    <x-divider/>

    <x-panel>
        <img src="{{$user->profile_image}}" width="300" class="rounded-4xl mx-auto">
        <div class="flex flex-col justify-center items-center">
            <h1 class="text-2xl font-bold">{{$user->name}}</h1>
            <p>{{$user->email}}</p>
            <h1 class="text-xl font-bold">Role</h1>
            @if($user->admin === true)
                <p>{{$user->name}} is an admin.</p>
            @else
                <p>{{$user->name}} is a user.</p>
            @endif
        </div>
    </x-panel>
    
    <x-panel>
        <h1 class="text-3xl text-center font-bold mb-6">{{$user->name}}'s Likes</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($user->animangalists as $likes)
                <x-panel class="flex flex-col h-full">
                    <img src="{{$likes->cover_image}}" width="150" class="rounded-xl mx-auto h-40 object-cover">
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
                </x-panel>
            @endforeach
        </div>
    </x-panel>

</x-layout>