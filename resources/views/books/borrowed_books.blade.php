<x-app-layout>


    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg bg-gradient-to-r from-[#1e3a8a] via-[#1e40af] to-[#f5f5dc] dark:from-[#1b3380] dark:via-[#1b3999] dark:to-[#dcd6b4] sm:rounded-xl">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    @if($borrows->isEmpty())
                        <p class="py-8 text-center text-gray-500 dark:text-gray-400">
                            No books are currently borrowed.
                        </p>
                    @else
                        <div class="overflow-x-auto">
                        <table class="min-w-full text-sm font-medium text-black bg-white shadow-md rounded-xl dark:text-gray-900">
                                <thead class="bg-gradient-to-r from-[#1e40af] to-[#f5f5dc] text-white dark:from-[#1b3999] dark:to-[#dcd6b4]">
                                    <tr>
                                        <th class="px-6 py-3 tracking-wider text-left uppercase">Book</th>
                                        <th class="px-6 py-3 tracking-wider text-left uppercase">Borrower</th>
                                        <th class="px-6 py-3 tracking-wider text-left uppercase">Borrow Date</th>
                                        <th class="px-6 py-3 tracking-wider text-left uppercase">Return Date</th>
                                        <th class="px-6 py-3 tracking-wider text-left uppercase">Actual Return Date</th>
                                        <th class="px-6 py-3 tracking-wider text-left uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach($borrows as $borrow)
                                    <tr class="transition hover:bg-blue-50 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                @if($borrow->book && $borrow->book->photo)
                                                    <img src="{{ Storage::url($borrow->book->photo) }}" class="object-cover w-12 h-12 rounded shadow-md">
                                                @else
                                                    <div class="flex items-center justify-center w-12 h-12 text-gray-500 bg-gray-200 border-2 border-dashed rounded dark:bg-gray-500">
                                                        <i class="fas fa-book"></i>
                                                    </div>
                                                @endif
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-200">
                                                        {{ $borrow->book->name ?? 'Deleted Book' }}
                                                    </div>
                                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                                        {{ $borrow->book->author ?? 'N/A' }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($borrow->user)
                                                <div class="text-sm text-gray-900 dark:text-gray-200">
                                                    {{ $borrow->user->first_name }} {{ $borrow->user->last_name }}
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    {{ $borrow->user->email }}
                                                </div>
                                            @else
                                                <div class="text-sm text-gray-900 dark:text-gray-200">
                                                    Deleted User
                                                </div>
                                                <div class="text-sm text-gray-500 dark:text-gray-400">
                                                    Deleted Email
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $borrow->borrow_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $borrow->return_date }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                            {{ $borrow->actual_return_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-3 py-1 text-xs font-semibold rounded-full shadow
                                                {{ $borrow->status === 'borrowed' ? 'bg-yellow-100 text-yellow-800' : 'bg-green-100 text-green-800' }}">
                                                {{ ucfirst($borrow->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-6">
                            {{ $borrows->links() }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
