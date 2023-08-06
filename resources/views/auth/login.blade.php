<x-guest-layout>
<div class="bg-blue-500 bg-opacity-75">
<x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <!-- https://play.tailwindcss.com/MIwj5Sp9pw -->

    <div class="flex bg-white rounded-lg shadow-lg overflow-hidden  lg:max-w-x2">
        <div class="hidden lg:block lg:w-full bg-cover"
            style="background-image:url('https://images.unsplash.com/photo-1571260899304-425eee4c7efc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80')">
        </div>
        <div class="w-full p-8 lg:max-w-x2">
            <p class="text-xl text-gray-600 text-center">Welcome back!</p>

            <x-validation-errors class="mb-4" />

@if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <x-label for="email" value="{{ __('Email') }}" />
        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
    </div>

    <div class="mt-4">
        <x-label for="password" value="{{ __('Password') }}" />
        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
    </div>


    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-button class="ml-4">
            {{ __('Log in') }}
        </x-button>
    </div>
</form>
            
        </div>
    </div>

    </x-authentication-card>
</div>
    
</x-guest-layout>
