<x-layout>

    <div class="bg-gray-100 p-6 rounded-lg">
        <h2 class="text-2xl font-semibold text-gray-700 mb-6">Dashboard</h2>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <div class="flex justify-between">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Profil Siswa</h3>
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
                            <a href="/admin/kelola-user/tambah-user"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
                                PDF</a>
                        </li>
                        <li>
                            <a href="/admin/kelola-user/tambah-user-siswa"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
                                Excel</a>
                        </li>
                    </ul>
                </div>
            </div>

            <table class="min-w-full bg-white rounded-lg">
                <tbody>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">NIS</td>
                        <td class="px-6 py-3 text-gray-900 underline">{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Nama</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Jenis Kelamin</td>
                        <td class="px-6 py-3 text-gray-900">{{ ucfirst($siswa->jenis_kelamin) }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Tanggal Lahir</td>
                        <td class="px-6 py-3 text-gray-900">
                            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->locale('id')->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Alamat</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Email</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->email }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Nomor Telepon</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->nomor_telepon }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Status</td>
                        <td class="px-6 py-3 text-gray-900">{{ ucfirst($siswa->status) }}</td>
                    </tr>
                </tbody>

            </table>

        </div>

    </div>

</x-layout>
