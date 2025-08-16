<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 md:mr-4">
                {{ __('Users Management') }}
            </h2>

            <form action="{{ route('users.index') }}" method="GET" class="relative w-full max-w-md">
                <div class="flex overflow-hidden rounded-lg shadow-md">
                    <input
                        type="search"
                        name="search"
                        class="flex-1 px-4 py-3 text-gray-100 bg-[#1e3a8a] focus:outline-none focus:ring-2 focus:ring-[#1e40af] placeholder-gray-300 rounded-l-lg"
                        placeholder="Search by name or email..."
                        value="{{ request('search') }}"
                    >
                    <button
                        type="submit"
                        class="flex items-center justify-center transition-colors bg-[#1e40af] w-14 hover:bg-[#162b8a] rounded-r-lg"
                    >
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg bg-gradient-to-r from-[#1e3a8a] via-[#1e40af] to-[#f5f5dc] dark:from-[#1b3380] dark:via-[#1b3999] dark:to-[#dcd6b4] sm:rounded-xl">
                <div class="p-8">

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm font-medium text-black bg-white shadow-md rounded-xl dark:text-gray-900">
                            <thead>
                                <tr class="bg-gradient-to-r from-[#1e40af] to-[#f5f5dc] text-black dark:from-[#1b3999] dark:to-[#dcd6b4]">
                                    <th class="px-6 py-3 text-left">Photo</th>
                                    <th class="px-6 py-3 text-left">First Name</th>
                                    <th class="px-6 py-3 text-left">Last Name</th>
                                    <th class="px-6 py-3 text-left">Address</th>
                                    <th class="px-6 py-3 text-left">Phone</th>
                                    <th class="px-6 py-3 text-left">Role</th>
                                    <th class="px-6 py-3 text-left">Email</th>
                                    <th class="px-6 py-3 text-left">Bookings</th>
                                    <th class="px-6 py-3 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @foreach($users as $user)
                                <tr class="transition hover:bg-blue-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-3">
                                        @if($user->photo)
                                            <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->first_name }}" class="w-12 h-12 rounded-full shadow-md">
                                        @else
                                            <div class="flex items-center justify-center w-12 h-12 bg-gray-200 rounded-full dark:bg-gray-500">
                                                <i class="text-black fas fa-user dark:text-black"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-3">{{ $user->first_name }}</td>
                                    <td class="px-6 py-3">{{ $user->last_name }}</td>
                                    <td class="px-6 py-3">{{ $user->address }}</td>
                                    <td class="px-6 py-3">{{ $user->phone }}</td>
                                    <td class="px-6 py-3">
                                        <span class="px-3 py-1 text-xs font-semibold text-black rounded-full shadow
                                            {{ $user->role == 'admin' ? 'bg-blue-700' : 'bg-green-600' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-3">{{ $user->email }}</td>
                                    <td class="px-6 py-3">
                                        <a href="{{ route('users.borrows', $user->id) }}"
                                           class="inline-flex items-center px-3 py-1 text-sm font-medium text-blue-600 transition bg-blue-100 rounded-lg shadow hover:bg-blue-200">
                                            <i class="mr-1 fas fa-list"></i> Details
                                        </a>
                                    </td>
                                    <td class="px-6 py-3">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-sm font-medium text-black transition bg-red-500 rounded-lg shadow hover:bg-red-600">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
