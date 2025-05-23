<x-layout>
    <x-header>People</x-header>
    <x-divider/>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($users as $user)
    <a href="/profile/{{$user->id}}">
        <x-panel class="flex flex-col h-full">
            <img src="{{$user->profile_image}}" class="rounded-xl mx-auto object-cover">
            <div class="flex flex-col justify-center items-center mt-3 flex-grow">
                <h1 class="text-2xl font-bold text-center w-full">{{$user->name}}</h1>
                <p class="text-center">{{$user->email}}</p>
                <p>Likes: {{$user->animangalists_count}}</p>
            </div>
        </x-panel>
    </a>
    @endforeach
    </div>
</x-layout>