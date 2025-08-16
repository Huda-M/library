<x-app-layout>
<x-slot name="header">
    <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200 md:mr-4">
            {{ __('Available Books') }}
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
        @if(Auth::check() && Auth::user()->role === 'admin')
        <div class="flex space-x-2">
                            <a href="{{ route('books.create') }}" class="flex-1 px-4 py-2 font-semibold text-center text-white transition-colors duration-200 bg-blue-500 rounded-lg hover:bg-blue-600">
                                <i class="mr-1 fas fa-eye"></i> add book
                            </a>
                        </div>
                        @endif
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
<div class="grid justify-center gap-6" style="grid-template-columns: repeat(auto-fill, 300px);">
    @foreach($books as $book)
<div class="mb-6 overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow-md dark:bg-gray-800 hover:shadow-lg">                    <div class="relative">
                        @if($book->photo)
                            <img src="{{ Storage::url($book->photo) }}" alt="{{ $book->name }}" class="object-cover w-full h-48">
                        @else
                            <div class="flex items-center justify-center w-full h-48 text-gray-500 bg-gray-200 border-2 border-dashed rounded-xl">
                                <i class="text-4xl fas fa-book"></i>
                            </div>
                        @endif
                        <span class="absolute px-2 py-1 text-xs font-bold text-white bg-blue-500 rounded top-2 right-2">
                            {{ $book->available_copies }} available copies
                        </span>
                    </div>
                    <div class="p-4">
                        <div class="mb-3">
                            <h2 class="mb-1 text-lg font-semibold text-gray-800 truncate dark:text-gray-200">
                                {{ $book->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="mr-1 fas fa-user"></i> {{ $book->author }}
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                <i class="mr-1 fas fa-layer-group"></i> {{ $book->category->name }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between mb-3">
                            <p class="text-lg font-bold text-green-600 dark:text-green-400">
                                ${{ number_format($book->price, 2) }}
                            </p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                <i class="mr-1 fas fa-calendar"></i> {{ $book->publish_year }}
                            </p>
                        </div>
                        <p class="mb-4 text-sm text-gray-600 dark:text-gray-400 line-clamp-2">
                            {{ $book->description }}
                        </p>
                        @if(Auth::check() && Auth::user()->role === 'admin')
                        <div class="flex space-x-2">
    <a href="{{ route('books.edit', $book->id) }}" class="flex-1 px-4 py-2 font-semibold text-center text-white transition-colors duration-200 bg-blue-500 rounded-lg hover:bg-blue-600">
        <i class="mr-1 fas fa-edit"></i> Edit
    </a>
    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="flex-1">
        @csrf
        @method('DELETE')
        <button type="submit" class="w-full px-4 py-2 font-semibold text-center text-white transition-colors duration-200 bg-red-500 rounded-lg hover:bg-red-600">
            <i class="mr-1 fas fa-trash"></i> Delete
        </button>
    </form>
</div>
@endif
@if(Auth::check() && Auth::user()->role === 'student')
<div class="flex space-x-2">

                            @if($book->available_copies > 0)
                            <form action="{{ route('borrow.store', $book->id) }}" method="POST" class="flex-1">
                                @csrf
                                <button type="submit" class="w-full px-4 py-2 font-semibold text-center text-black transition-colors duration-200 bg-white rounded-lg hover:bg-green-600">
                                    <i class="mr-1 fas fa-book"></i> Borrow
                                </button>
                            </form>
                            @endif
                        </div>
                        @endif
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
