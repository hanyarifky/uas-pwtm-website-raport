<h4>Data Siswa</h4>
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

<h4 class="text-center lg:text-xl text-xl font-bold dark:text-white mb-4">Rapor Siswa</h4>
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
            <tr>
                <td class="px-6 py-4">{{ $index + 1 }}</td>
                <td class="px-6 py-4">{{ $nilai->mata_pelajarans->nama_mata_pelajaran }}</td>
                <td class="px-6 py-4">{{ $nilai->mata_pelajarans->nilai_kkm }}</td>
                <td class="px-6 py-4">{{ $nilai->pts_ganjil }}</td>
                <td class="px-6 py-4">{{ $nilai->pts_genap }}</td>
                <td class="px-6 py-4">{{ $nilai->uas }}</td>
                <td class="px-6 py-4">{{ $nilai->ukk }}</td>
                <td class="px-6 py-4">{{ $nilai->nilai_total }}</td>
                <td class="text-center">
                    @if ($nilai->mata_pelajarans->nilai_kkm < $nilai->nilai_total)
                        <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Terpenuhi</span>
                    @else
                        <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-sm">Tidak Terpenuhi</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
