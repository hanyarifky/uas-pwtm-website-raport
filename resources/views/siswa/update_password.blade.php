<x-layout>
    <form action="/siswa/update-password/{{ $user->id }}" method="POST">
        @csrf
        <div class="grid gap-6 mb-6 md:grid-cols-2">
            {{-- Password Lama --}}
            <div>
                <label for="password_lama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Lama</label>
                <input type="password" name="password_lama" id="password_lama" value="{{ old('password_lama', $user->password_lama) }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password_lama') border-red-500 bg-red-50 text-red-900 dark:text-red-500 dark:border-red-500 @enderror">
                @error('password_lama')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Baru --}}
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                <input type="password" name="password" id="password" minlength="8" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') border-red-500 bg-red-50 text-red-900 dark:text-red-500 dark:border-red-500 @enderror">
                @error('password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Repeat Password Baru --}}
            <div>
                <label for="repeat_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat Password</label>
                <input type="password" name="repeat_password" id="repeat_password" minlength="8" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('repeat_password') border-red-500 bg-red-50 text-red-900 dark:text-red-500 dark:border-red-500 @enderror">
                @error('repeat_password')
                    <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit"
            class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
            Ganti Password
        </button>
    </form>
</x-layout>
