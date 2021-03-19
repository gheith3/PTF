<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        @livewire("auth.pin", ['user' => $user])
    </x-jet-authentication-card>


</x-guest-layout>
