<x-layout>
    <x-header>Login</x-header>
    <x-divider/>

    <x-panel>
        <form method="POST" action="/login">
            @csrf

            <x-label>Email</x-label>
            <x-input type="email" name="email"></x-input>

            <x-label>Password</x-label>
            <x-input type="password" name="password"></x-input>                

            <x-button>Login</x-button>
        </form>
    </x-panel>
</x-layout>