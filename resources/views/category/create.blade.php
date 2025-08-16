<x-app-layout>

    <div class="max-w-xl p-8 mx-auto mt-6 transition-transform duration-300 transform shadow-2xl bg-gradient-to-r from-blue-500 via-indigo-500 to-blue-600 rounded-2xl hover:scale-105">
        <form action="{{ route('category.store') }}" method="POST">
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


            <div>
                <x-primary-button>create</x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
