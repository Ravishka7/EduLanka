<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" >
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                @if (session()->has('message'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative m-4"
                        role="alert">
                        <strong class="font-bold">{{ session('message') }}</strong>
                    </div>
                @endif

                <div class="flex justify-between items-center px-6 py-4">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        {{ __('Roles') }}
                    </h2>
                    <a href="{{ route('roles.create') }}" class="btn btn-primary hover:shadow-form rounded-md bg-[#DF7DA2] py-3 px-8 text-base font-semibold text-white outline-none">Create Role</a>
                </div>

                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900" scope="col">ID
                            </th>
                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900" scope="col">
                                Role Name</th>
                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900" scope="col">
                                Status</th>
                            <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900" scope="col">
                                Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        @foreach ($roles as $role)
                            <tr>
                                <td scope="row" class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $role->id }}</th>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $role->name }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    {{ $role->status ? 'Active' : 'Inactive' }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary mb-5 hover:shadow-form rounded-md bg-[#DF7DA2] py-3 px-5 text-base font-semibold text-white outline-none">Edit</a>

                                    <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Delete" class="btn btn-danger mt-3 hover:shadow-form rounded-md bg-[#D3D3D3] py-3 px-8 text-base font-semibold text-black outline-none    B                   "
                                            onclick="return confirm('Are you sure?')">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </div>
        </div>
    </div>

            <!-- Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])

            <!-- Styles -->
        @livewireStyles
</x-app-layout>