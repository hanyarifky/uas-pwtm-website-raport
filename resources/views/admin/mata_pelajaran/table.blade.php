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
                            Jumlah Jam
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
                        <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $mapel->jumlah_jam }} Menit
                        </td>
                        {{-- <td class=" flex font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/admin/mata-pelajaran/{{ $mapel->id }}/edit"
                                class="cursor-pointer pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/admin/mata-pelajaran/{{ $mapel->id }}"
                                class="cursor-pointer font-medium text-red-800 dark:text-blue-500 hover:underline"
                                data-confirm-delete="true">Hapus</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>