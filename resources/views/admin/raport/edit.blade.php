<x-layout>
    <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md sm:rounded-lg">
        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Edit Rapor Siswa</h4>
        </div>

        <form method="POST" action="/admin/raport/nilai/{{ $nilai->id }}">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request update -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">

                <!-- Mata Pelajaran (Header) -->
                <div class="col-span-2">
                    <label for="mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" value="{{ $nilai->mata_pelajarans->nama_mata_pelajaran }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>

                <!-- Pengetahuan (KI-3) -->
                <div>
                    <label for="nilai_angka_pengetahuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengetahuan (KI-3) Angka</label>
                    <input name="nilai_angka_pengetahuan" type="number" id="nilai_angka_pengetahuan" value="{{ old('nilai_angka_pengetahuan', $nilai->nilai_angka_pengetahuan) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nilai_angka_pengetahuan') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('nilai_angka_pengetahuan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi_pengetahuan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pengetahuan (KI-3) Deskripsi</label>
                    <textarea name="deskripsi_pengetahuan" id="deskripsi_pengetahuan" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('deskripsi_pengetahuan') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror">{{ old('deskripsi_pengetahuan', $nilai->deskripsi_pengetahuan) }}</textarea>
                    @error('deskripsi_pengetahuan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Keterampilan (KI-4) -->
                <div>
                    <label for="nilai_angka_keterampilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterampilan (KI-4) Angka</label>
                    <input name="nilai_angka_keterampilan" type="number" id="nilai_angka_keterampilan" value="{{ old('nilai_angka_keterampilan', $nilai->nilai_angka_keterampilan) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nilai_angka_keterampilan') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('nilai_angka_keterampilan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi_keterampilan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterampilan (KI-4) Deskripsi</label>
                    <textarea name="deskripsi_keterampilan" id="deskripsi_keterampilan" rows="3" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('deskripsi_keterampilan') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror">{{ old('deskripsi_keterampilan', $nilai->deskripsi_keterampilan) }}</textarea>
                    @error('deskripsi_keterampilan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <button type="submit"
                class="cursor-pointer text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
            <a href="{{ route('raport.siswa', ['siswa' => $nilai->siswas->id]) }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </form>
    </div>

</x-layout>
