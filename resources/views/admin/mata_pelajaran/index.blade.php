<x-layout>
    <div class="relative p-5 overflow-x-auto shadow-md sm:rounded-lg">

        <div class="flex justify-between flex-col lg:flex-row lg:mb-6 gap-6 mt-3">
            <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white">Data Mata Pelajaran</h4>

            <div class="flex">

                <a href="/admin/mata-pelajaran/create"
                    class="lg:px-5 lg:py-2.5 text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm py-3 text-center me-2 mb-2">Tambah
                    Data
                </a>

                <a id="dropdownDefaultButton" data-dropdown-toggle="dropdown"
                    class="cursor-pointer px-3 py-2 text-sm font-medium text-center inline-flex items-center text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 rounded-lg me-2 mb-2 ">
                    <svg class="w-[18px] h-[18px] text-white mr-1 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                            clip-rule="evenodd" />
                    </svg>
                    Cetak
                </a>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                        <li>
                            <a href="/admin/mata-pelajaran/pdf"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
                                PDF</a>
                        </li>
                        <li>
                            <a href="/admin/mata-pelajaran/excel"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
                                Excel</a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>

        <table id="data-table">

            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Kode
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Nama Mata Pelajaran
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Nilai KKM
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Aksi
                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapels as $mapel)
                    <tr>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $mapel->kode_mata_pelajaran }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $mapel->nama_mata_pelajaran }}
                        </td>
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $mapel->nilai_kkm }}
                        </td>
                        <td class=" flex font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/admin/mata-pelajaran/{{ $mapel->id }}/edit"
                                class="cursor-pointer pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/admin/mata-pelajaran/{{ $mapel->id }}"
                                class="cursor-pointer font-medium text-red-800 dark:text-blue-500 hover:underline"
                                data-confirm-delete="true">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


</x-layout>
