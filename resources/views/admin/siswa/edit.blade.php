<x-layout>

    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Edit Siswa</h4>
        </div>

        <form method="POST" action="/admin/siswa/{{ $siswa->id }}">
            @csrf
            @method('PUT') <!-- Menggunakan PUT untuk mengindikasikan edit -->
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="nis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                    <input name="nis" type="text" id="nis" value="{{ old('nis', $siswa->nis) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nis') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="Contoh: 1234567890" required />
                    @error('nis')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input name="nama" type="text" id="nama" value="{{ old('nama', $siswa->nama) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nama') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="Contoh: John Doe" required />
                    @error('nama')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="laki-laki" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="perempuan" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                    <input name="tanggal_lahir" type="date" id="tanggal_lahir" value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}" max="{{ \Carbon\Carbon::now()->toDateString() }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    @error('tanggal_lahir')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="alamat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="4"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>{{ old('alamat', $siswa->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input name="email" type="email" id="email" value="{{ old('email', $siswa->email) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="nomor_telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor Telepon</label>
                    <input name="nomor_telepon" type="text" id="nomor_telepon" value="{{ old('nomor_telepon', $siswa->nomor_telepon) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    @error('nomor_telepon')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <select name="status" id="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="aktif" {{ old('status', $siswa->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status', $siswa->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                    @error('status')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>
            </div>

            <button type="submit"
                class="text-white cursor-pointer bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
            <a href="/admin/siswa"
                class="text-white cursor-pointer bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </form>
    </div>

</x-layout>
