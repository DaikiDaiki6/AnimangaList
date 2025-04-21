<x-layout>
    <x-header>Edit Profile</x-header>
    <x-divider/>

    <x-panel>
        <p>Type in where you want to edit. Every option is optional...</p>
        <x-divider/>
        <form method="POST" action="/user/edit">
            @csrf
            <x-label>Name</x-label>
            <x-input type="name" name="name"></x-input>

            <x-label>Email</x-label>
            <x-input type="email" name="email"></x-input>

            <x-label>Password</x-label>
            <x-input type="password" name="password"></x-input> 

            <x-button>Edit</x-button>
        </form>
    </x-panel>
</x-layout>