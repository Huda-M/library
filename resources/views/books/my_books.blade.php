<x-app-layout>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-lg bg-gradient-to-r from-[#1e3a8a] via-[#1e40af] to-[#f5f5dc] dark:from-[#1b3380] dark:via-[#1b3999] dark:to-[#dcd6b4] sm:rounded-xl">
                <div class="p-8 text-gray-900 dark:text-gray-100">

                    @if($books->isEmpty())
                        <p class="py-8 text-center text-gray-500 dark:text-gray-400">
                            You haven't borrowed any books yet.
                        </p>
                    @else
                        <div class="grid justify-center gap-6" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                            @foreach($books as $book)
                                <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow-md dark:bg-gray-800 hover:shadow-lg">
                                    <div class="relative">
                                        @if($book->photo)
                                            <img src="{{ Storage::url($book->photo) }}" alt="{{ $book->name }}" class="object-cover w-full h-48 rounded-t-lg">
                                        @else
                                            <div class="flex items-center justify-center w-full h-48 text-gray-500 bg-gray-200 border-2 border-dashed rounded-t-lg dark:bg-gray-700">
                                                <i class="text-4xl fas fa-book"></i>
                                            </div>
                                        @endif
                                        <span class="absolute px-3 py-1 text-xs font-bold text-white rounded top-2 right-2 bg-gradient-to-r from-[#1e40af] to-[#f5f5dc] dark:from-[#1b3999] dark:to-[#dcd6b4] shadow">
                                            @if($book->pivot->status === 'borrowed')
                                                Borrowed
                                            @else
                                                Returned
                                            @endif
                                        </span>
                                    </div>
                                    <div class="p-6">
                                        <div class="mb-3">
                                            <h2 class="mb-1 text-lg font-semibold text-gray-900 truncate dark:text-gray-200">
                                                {{ $book->name }}
                                            </h2>
                                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                                <i class="mr-1 fas fa-user"></i> {{ $book->author }}
                                            </p>
                                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                <i class="mr-1 fas fa-layer-group"></i> {{ $book->category->name }}
                                            </p>
                                        </div>

                                        <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                            <p><i class="mr-1 fas fa-calendar-check"></i> Borrow Date: {{ $book->pivot->borrow_date }}</p>
                                            <p><i class="mr-1 fas fa-calendar"></i> Return Date: {{ $book->pivot->return_date }}</p>
                                            @if($book->pivot->status === 'returned')
                                                <p><i class="mr-1 fas fa-calendar-times"></i> Actual Return: {{ $book->pivot->actual_return_date }}</p>
                                            @endif
                                        </div>

                                        <div class="mt-4">
                                            @if($book->pivot->status === 'borrowed')
                                                <form action="{{ route('books.return', $book->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="w-full px-4 py-2 font-semibold text-center text-white transition-colors duration-200 bg-gradient-to-r from-[#1e40af] to-[#1e3a8a] rounded-lg shadow hover:from-[#1b3999] hover:to-[#1b3380]">
                                                        <i class="mr-1 fas fa-undo"></i> Return Book
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $books->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
