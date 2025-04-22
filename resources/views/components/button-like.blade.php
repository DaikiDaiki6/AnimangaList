@props(['likes'])


<div class="flex justify-end mx-4">
    @if (! $user->animangalists->contains($likes->id))
    <a href="/like/animanga/{{$likes->id}}" class="bg-white/12 rounded-xl hover:bg-white/20 border border-transparent hover:border-blue-600 transition-colors duration-300 font-medium px-2">
        Like
    </a>
    @else
    <a href="/like/animanga/{{$likes->id}}" class="bg-red-500/12 rounded-xl hover:bg-red-500/20 border border-transparent hover:border-blue-600 transition-colors duration-300 font-medium px-2">
        Liked
    </a>
    @endif
</div>