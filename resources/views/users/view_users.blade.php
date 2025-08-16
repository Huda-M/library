<x-app-layout>
<x-slot name="header">
    <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 md:mr-4">
            {{ __('users management') }}
        </h2>
    <div class="flex items-center max-w-md mx-auto bg-gray-800 rounded-lg " x-data="{ search: '' }">
        <div class="w-full">
            <input type="search" class="w-full px-4 py-1 text-gray-800 rounded-full focus:outline-none"
                placeholder="search" x-model="search">
        </div>
        <div>
            <button type="submit" class="flex items-center justify-center w-12 h-12 text-white bg-blue-500 rounded-r-lg"
                :class="(search.length > 0) ? 'bg-purple-500' : 'bg-gray-500 cursor-not-allowed'"
                :disabled="search.length == 0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </div>
</x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-700">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-600">
                                    <th class="px-4 py-2 text-left">Photo</th>
                                    <th class="px-4 py-2 text-left">First Name</th>
                                    <th class="px-4 py-2 text-left">Last Name</th>
                                    <th class="px-4 py-2 text-left">Address</th>
                                    <th class="px-4 py-2 text-left">Phone</th>
                                    <th class="px-4 py-2 text-left">Role</th>
                                    <th class="px-4 py-2 text-left">Email</th>
                                    <th class="px-4 py-2 text-left">bookings</th>
                                    <th class="px-4 py-2 text-left">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                                @foreach($users as $user)
                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-600">
                                    <td class="px-4 py-2">
                                        @if($user->photo)
                                            <img src="{{ Storage::url($user->photo) }}" alt="{{ $user->first_name }}" class="w-10 h-10 rounded-full">
                                        @else
                                            <div class="flex items-center justify-center w-10 h-10 bg-gray-200 rounded-full dark:bg-gray-500">
                                                <i class="text-gray-500 fas fa-user dark:text-gray-300"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2">{{ $user->first_name }}</td>
                                    <td class="px-4 py-2">{{ $user->last_name }}</td>
                                    <td class="px-4 py-2">{{ $user->address }}</td>
                                    <td class="px-4 py-2">{{ $user->phone }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 text-xs font-semibold text-white bg-{{ $user->role == 'admin' ? 'blue' : 'green' }}-500 rounded-full">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('users.borrows', $user->id) }}" class="text-blue-500 hover:text-blue-700">
                                            <i class="fas fa-list"></i> details
                                        </a>
                                    </td>
                                    <td class="px-4 py-2">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-black bg-white rounded hover:bg-red-600">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
