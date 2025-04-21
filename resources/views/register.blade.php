<x-layout>
    <x-header>Register</x-header>
    <x-divider/>

    <x-panel>
        <form method="POST" action="/user/create">
            @csrf
            <x-label>Name</x-label>
            <x-input type="text" name="name"></x-input>

            <x-label>Email</x-label>
            <x-input type="email" name="email"></x-input>

            <x-label>Password</x-label>
            <x-input type="password" name="password"></x-input>                
        
            <x-label>Confirm Password</x-label>
            <x-input type="password" name="password_confirmation"></x-input>

            <x-button>Create</x-button>
        </form>
    </x-panel>
</x-layout>