<table id="data-table">

    <thead>
        <tr>
            <th class="">
                <span class="flex items-center">
                    No. Absen
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    NIS (Nomor Induk Siswa)
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Nama Siswa
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Jenis Kelamin
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Tanggal Lahir
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    E-mail
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Nomor
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Alamat
                </span>
            </th>
            <th>
                <span class="flex items-center">
                    Status
                </span>
            </th>
            {{-- <th>
                <span class="flex items-center">
                    Aksi
                </span>
            </th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($siswas as $siswa)
            <tr>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $loop->iteration }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $siswa->nis }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $siswa->nama }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $siswa->jenis_kelamin }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $siswa->email }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $siswa->nomor_telepon }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $siswa->alamat }}
                </td>
                <td class="font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    @if ($siswa->status == 'aktif')
                        <span
                            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-green-400 border border-green-400">Aktif</span>
                    @else
                        <span
                            class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-red-400 border border-red-400">Tidak
                            Aktif</span>
                    @endforelse
                </td>
                {{-- <td class=" flex font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="/admin/siswa/{{ $siswa->id }}/"
                                class="cursor-pointer pr-3 font-medium text-green-600 dark:text-blue-500 hover:underline">Detail</a>
                            <a href="/admin/siswa/{{ $siswa->id }}/edit"
                                class="cursor-pointer pr-3 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="/admin/siswa/{{ $siswa->id }}"
                                class="cursor-pointer font-medium text-red-800 dark:text-blue-500 hover:underline"
                                data-confirm-delete="true">Hapus</a>
                        </td> --}}
            </tr>
        @endforeach
    </tbody>
</table>
