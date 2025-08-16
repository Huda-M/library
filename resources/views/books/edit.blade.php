<x-app-layout>


    <div class="max-w-xl p-8 mx-auto mt-6 transition-transform duration-300 transform shadow-2xl bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-600 rounded-2xl hover:scale-105">
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if(session('success'))
                <div class="p-4 mb-4 text-green-300 bg-green-900 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <label for="name" class="block mb-2 font-semibold text-black">Name</label>
                <input type="text" name="name" id="name"
                        value="{{ old('name', $book->name) }}"
                        class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('name')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="publish_year" class="block mb-2 font-semibold text-black">Publish Year</label>
                <input type="date" name="publish_year" id="publish_year"
                        value="{{ old('publish_year', $book->publish_year) }}"
                        class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('publish_year')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="category_id" class="block mb-2 font-semibold text-black">Category</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $book->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block mb-2 font-semibold text-black">Author</label>
                <input type="text" name="author" id="author"
                        value="{{ old('author', $book->author) }}"
                        class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('author')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="available_copies" class="block mb-2 font-semibold text-black">Available Copies</label>
                <input type="number" name="available_copies" id="available_copies"
                        value="{{ old('available_copies', $book->available_copies) }}"
                        class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('available_copies')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block mb-2 font-semibold text-black">Price</label>
                <input type="number" name="price" id="price"
                        value="{{ old('price', $book->price) }}"
                        class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('price')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="photo" class="block mb-2 font-semibold text-black">Photo</label>
                <input type="file" name="photo" id="photo"
                        class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400">
                @error('photo')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
                @if($book->photo)
                    <div class="mt-4">
                        <p class="text-gray-400">Current Photo:</p>
                        <img src="{{ Storage::url($book->photo) }}" alt="Current book photo" class="object-cover w-32 h-32 mt-2 rounded">
                    </div>
                @endif
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-2 font-semibold text-black">Description</label>
                <textarea name="description" id="description" rows="4"
                            class="w-full px-4 py-2 text-black bg-white border border-gray-600 rounded focus:outline-none focus:ring focus:border-blue-400"
                >{{ old('description', $book->description) }}</textarea>
                @error('description')
                    <div class="mt-1 text-red-400">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6">
                <x-primary-button>save</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
