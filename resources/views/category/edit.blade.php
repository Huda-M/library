<x-app-layout>
    <div class="max-w-xl p-8 mx-auto mt-6 transition-transform duration-300 transform shadow-2xl bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-600 rounded-2xl hover:scale-105">
        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            @if(session('success'))
                <div class="p-4 mb-4 text-white bg-green-600 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4">
                <label for="name" class="block mb-2 font-semibold text-white">Category Name</label>
                <input type="text" name="name" id="name"
                        value="{{ old('name', $category->name) }}"
                        class="w-full px-4 py-2 text-white border rounded bg-white/20 border-white/30 focus:outline-none focus:ring-2 focus:ring-white"
                        placeholder="Enter category name">
                @error('name')
                    <div class="mt-1 text-yellow-300">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-6">
                <button type="submit" class="px-6 py-3 font-semibold text-white transition-colors bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-white">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
