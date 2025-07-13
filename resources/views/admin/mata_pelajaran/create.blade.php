<x-layout>

    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Tambah Mata Pelajaran</h4>
        </div>

        <form method="POST" action="/admin/mata-pelajaran">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="kode_mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Mata Pelajaran</label>
                    <input name="kode_mata_pelajaran" type="text" id="kode_mata_pelajaran" value="{{ old('kode_mata_pelajaran') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('kode_mata_pelajaran') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="cont: MP1" required />
                    @error('kode_mata_pelajaran')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>
                <div>
                    <label for="nama_mata_pelajaran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Mata Pelajaran</label>
                    <input name="nama_mata_pelajaran" type="text" id="nama_mata_pelajaran" value="{{ old('nama_mata_pelajaran') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nama_mata_pelajaran') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="cont: Bahasa Indonesia" required />
                    @error('nama_mata_pelajaran')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>
                
                <div>
                    <label for="nilai_kkm" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nilai KKM</label>
                    <input name="nilai_kkm" type="number" id="nilai_kkm" value="{{ old('nilai_kkm') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500
                    @error('nilai_kkm') 
                                bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 dark:bg-gray-700 focus:border-red-500 block w-full p-2.5 dark:text-red-500 dark:placeholder-red-500 dark:border-red-500
                    @enderror"
                        placeholder="cont: 75" required />
                    @error('nilai_kkm')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium"></span>
                            {{ $message }} </p>
                    @enderror
                </div>
                
            </div>
            <button type="submit"
                class="text-white cursor-pointer bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Tambah</button>
            <a href="/admin/mata-pelajaran"
                class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Kembali</a>
        </form>
    </div>





</x-layout>
