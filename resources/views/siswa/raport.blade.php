<x-layout>

    <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md  sm:rounded-lg">
        <div class="flex items-center gap-2 mb-4">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z"
                    clip-rule="evenodd" />
            </svg>

            <h4 class="text-xl font-bold dark:text-white">Data Siswa</h4>



        </div>

        <!-- Tabel Detail Siswa -->
        <table class="min-w-full bg-white rounded-lg ">
            <tbody>
                <tr class="">
                    <td class="px-6 py-3 text-gray-600 font-bold">NIS</td>
                    <td class="px-6 py-3 text-gray-900 underline">{{ $siswa->nis }}</td>
                </tr>
                <tr>
                    <td class="px-6 py-3 text-gray-600 font-bold">Nama</td>
                    <td class="px-6 py-3 text-gray-900">{{ $siswa->nama }}</td>
                </tr>

                <tr>
                    <td class="px-6 py-3 text-gray-600 font-bold">Status</td>
                    <td class="px-6 py-3 text-gray-900">{{ ucfirst($siswa->status) }}</td>
                </tr>

                <tr>
                    <td class="px-6 py-3 text-gray-600 font-bold">Total Nilai</td>
                    <td class="px-6 py-3 text-gray-900">{{ $total_nilai }}</td>
                </tr>


                <tr>
                    <td class="px-6 py-3 text-gray-600 font-bold">Nilai Rata-rata</td>
                    <td class="px-6 py-3 text-gray-900">{{ $nilai_rata }}</td>
                </tr>
            </tbody>
        </table>
        <div class="container py-8 pl-5">

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
                        <a href="/siswa/raport/excel"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cetak
                            Excel</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>

    <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md sm:rounded-lg">
        <h4 class="text-center lg:text-xl text-xl font-bold dark:text-white mb-4">Menu Rapor Siswa</h4>
        <table class="table-auto w-full text-sm text-left text-black dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">No.</th>
                    <th class="px-6 py-3">Mata Pelajaran</th>
                    <th class="px-6 py-3">Nilai KKM</th>
                    <th class="px-6 py-3">PTS Ganjil</th>
                    <th class="px-6 py-3">PTS Genap</th>
                    <th class="px-6 py-3">UAS</th>
                    <th class="px-6 py-3">UKK</th>
                    <th class="px-6 py-3">Nilai Total</th>
                    <th class="px-6 py-3">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_raport_siswa as $index => $nilai)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $nilai->mata_pelajarans->nama_mata_pelajaran }}</td>
                        <td class="px-6 py-4 ">{{ $nilai->mata_pelajarans->nilai_kkm }}</td>
                        <td class="px-6 py-4">{{ $nilai->pts_ganjil }}</td>
                        <td class="px-6 py-4">{{ $nilai->pts_genap }}</td>
                        <td class="px-6 py-4">{{ $nilai->uas }}</td>
                        <td class="px-6 py-4">{{ $nilai->ukk }}</td>
                        <td class="px-6 py-4">{{ $nilai->nilai_total }}</td>
                        <td class="text-center">
                            @if ($nilai->mata_pelajarans->nilai_kkm < $nilai->nilai_total)
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-green-400 border border-green-400">Terpenuhi</span>
                                </span>
                            @else
                                <span
                                    class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-red-400 border border-red-400">Tidak
                                    Terpenuhi</span>
                            @endif

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>
