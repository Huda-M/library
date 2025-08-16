<x-app-layout>

    <div class="max-w-xl p-8 mx-auto mt-6 transition-transform duration-300 transform shadow-2xl bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-600 rounded-2xl hover:scale-105">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(session('success'))
                <div class="p-4 mb-6 text-green-700 bg-green-100 rounded-lg shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-5">
                <label for="name" class="block mb-2 font-semibold text-white">Name</label>
                <input type="text" name="name" id="name"
                        value="{{ old('name') }}"
                        class="w-full px-5 py-3 text-white placeholder-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                @error('name')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="publish_year" class="block mb-2 font-semibold text-white">Publish Year</label>
                <input type="date" name="publish_year" id="publish_year"
                        value="{{ old('publish_year') }}"
                        class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                @error('publish_year')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="category_id" class="block mb-2 font-semibold text-white">Category</label>
                <select name="category_id" id="category_id" class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <option value="" class="text-black">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="author" class="block mb-2 font-semibold text-white">Author</label>
                <input type="text" name="author" id="author"
                        value="{{ old('author') }}"
                        class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                @error('author')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="available_copies" class="block mb-2 font-semibold text-white">Available Copies</label>
                <input type="number" name="available_copies" id="available_copies"
                        value="{{ old('available_copies') }}"
                        class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                @error('available_copies')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="price" class="block mb-2 font-semibold text-white">Price</label>
                <input type="number" name="price" id="price"
                        value="{{ old('price') }}"
                        class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                @error('price')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="photo" class="block mb-2 font-semibold text-white">Photo</label>
                <input type="file" name="photo" id="photo"
                        class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300">
                @error('photo')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <label for="description" class="block mb-2 font-semibold text-white">Description</label>
                <textarea name="description" id="description" rows="4"
                            class="w-full px-5 py-3 text-white border border-white/30 rounded-xl bg-white/20 focus:outline-none focus:ring-2 focus:ring-blue-300"
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="mt-1 text-yellow-200">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <x-primary-button>create</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
