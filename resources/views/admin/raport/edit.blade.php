<x-layout>

    <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Edit Rapor Siswa</h4>
        </div>

        <form method="POST" action="/admin/raport/nilai/{{ $nilai->id }}">
            @csrf
            @method('PUT') <!-- Menandakan bahwa ini adalah request update -->

            <div class="grid gap-6 mb-6 md:grid-cols-2">
                
                <!-- Nama Mata Pelajaran (Header) -->
                <div>
                    <label for="mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Pelajaran</label>
                    <input type="text" id="mata_pelajaran" value="{{ $nilai->mata_pelajarans->nama_mata_pelajaran }}" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled />
                </div>

                <!-- PTS Ganjil -->
                <div>
                    <label for="pts_ganjil" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PTS Ganjil</label>
                    <input name="pts_ganjil" type="number" id="pts_ganjil" value="{{ old('pts_ganjil', $nilai->pts_ganjil) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('pts_ganjil') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('pts_ganjil')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- PTS Genap -->
                <div>
                    <label for="pts_genap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PTS Genap</label>
                    <input name="pts_genap" type="number" id="pts_genap" value="{{ old('pts_genap', $nilai->pts_genap) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('pts_genap') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('pts_genap')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- UAS -->
                <div>
                    <label for="uas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UAS</label>
                    <input name="uas" type="number" id="uas" value="{{ old('uas', $nilai->uas) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('uas') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('uas')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- UKK -->
                <div>
                    <label for="ukk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UKK</label>
                    <input name="ukk" type="number" id="ukk" value="{{ old('ukk', $nilai->ukk) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('ukk') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('ukk')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai Total -->
                {{-- <div>
                    <label for="nilai_total" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai Total</label>
                    <input name="nilai_total" type="number" id="nilai_total" value="{{ old('nilai_total', $nilai->nilai_total) }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('nilai_total') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required />
                    @error('nilai_total')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}

                <!-- Keterangan -->
                {{-- <div>
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <select name="keterangan" id="keterangan"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('keterangan') 
                            bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                        @enderror" required>
                        <option value="terpenuhi" {{ old('keterangan', $nilai->keterangan) == 'terpenuhi' ? 'selected' : '' }}>Terpenuhi</option>
                        <option value="tidak terpenuhi" {{ old('keterangan', $nilai->keterangan) == 'tidak terpenuhi' ? 'selected' : '' }}>Tidak Terpenuhi</option>
                        <option value="belum di nilai" {{ old('keterangan', $nilai->keterangan) == 'belum di nilai' ? 'selected' : '' }}>Belum Dinilai</option>
                    </select>
                    @error('keterangan')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div> --}}
            </div>

            <button type="submit"
                class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Update</button>
            <a href="{{ route('raport.siswa', ['siswa' => $nilai->siswas->id]) }}"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </form>
    </div>

</x-layout>
