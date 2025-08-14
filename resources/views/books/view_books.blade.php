<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('available books') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach($books as $book)
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="relative">
                        @if($book->photo)
                            <img src="{{ Storage::url($book->photo) }}" alt="{{ $book->name }}" class="w-full h-48 object-cover">
                        @else
                            <div class="bg-gray-200 border-2 border-dashed rounded-xl w-full h-48 flex items-center justify-center text-gray-500">
                                <i class="fas fa-book text-4xl"></i>
                            </div>
                        @endif
                        <span class="absolute top-2 right-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded">
                            {{ $book->available_copies }} available copies
                        </span>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-1 truncate">
                                {{ $book->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-user mr-1"></i> {{ $book->author }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                                <i class="fas fa-layer-group mr-1"></i> {{ $book->category->name }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">
                                ${{ number_format($book->price, 2) }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-calendar mr-1"></i> {{ $book->publish_year }}
                            </p>
                        </div>
                        <p class="text-gray-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">
                            {{ $book->description }}
                        </p>
                        <div class="flex space-x-2">
                            <a href="{{ route('books.show', $book->id) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg text-center font-semibold transition-colors duration-200">
                                <i class="fas fa-eye mr-1"></i> book
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
