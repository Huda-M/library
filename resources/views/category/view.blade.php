<x-app-layout>

        <div class="flex flex-col items-center justify-center space-y-4 md:flex-row md:space-y-0">
    <form action="{{ route('category.index') }}" method="GET" class="relative w-full max-w-md mx-auto">
        <div class="flex overflow-hidden rounded-lg shadow-sm">
            <input
                type="search"
                name="search"
                class="flex-1 px-4 py-3 text-[#1e3a8a] focus:outline-none focus:ring-2 focus:ring-[#1e40af]"
                placeholder="Search by name or author..."
                value="{{ request('search') }}">
            <button
                type="submit"
                class="flex items-center justify-center transition-colors bg-[#1e40af] w-14 hover:bg-[#1e3a8a]">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </div>
    </form>
</div>



    <div class="py-6">

                <a href="{{ route('category.create') }}" class="flex-1 px-4 py-2 font-semibold text-center text-white transition-colors duration-100 bg-[#1e40af] rounded-lg hover:bg-[#1e3a8a] mb-4">
            Add New Category
        </a>


        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid justify-center gap-6" style="grid-template-columns: repeat(auto-fill, 300px);">
            @foreach($Categories as $category)
                <div class="p-4">
                    <div class="mb-3">
                        <p class="mt-1 text-lg font-semibold text-[#3b3b2f]">
                            <i class="mr-1 fas fa-layer-group"></i> {{ $category->name }}
                        </p>
                        <div class="flex space-x-2">
                            <a href="{{ route('category.edit', $category->id) }}" class="flex-1 px-4 py-2 font-semibold text-center text-white transition-colors duration-200 bg-[#1e40af] rounded-lg hover:bg-[#1e3a8a]">
                                <i class="mr-1 fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full px-4 py-2 font-semibold text-center text-white transition-colors duration-200 bg-red-500 rounded-lg hover:bg-red-600">
                                    <i class="mr-1 fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>


                </div>
                </div>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $Categories->links() }}
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
