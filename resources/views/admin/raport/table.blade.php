    <div class="container">

        <!-- Student Data Section -->
        <div class="">
            <h4 class="">Data Siswa</h4>
            <table class="">
                <tbody>
                    <tr>
                        <td class="">NIS</td>
                        <td class="">{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="">Nama</td>
                        <td class="">{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="">Status</td>
                        <td class="">{{ ucfirst($siswa->status) }}</td>
                    </tr>
                    <tr>
                        <td class="">Total Nilai</td>
                        <td class="">{{ $total_nilai }}</td>
                    </tr>
                    <tr>
                        <td class="">Nilai Rata-rata</td>
                        <td class="">{{ $nilai_rata }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Report Card Table -->
        <!-- Menu Rapor Siswa -->
        <div class="">
            <h4 class="">Menu Rapor Siswa</h4>

            <table class="">
                <thead class="">
                    <tr class="">
                        <th class="" rowspan="2">No.</th>
                        <th class="" rowspan="2">Mata Pelajaran</th>
                        <th class="" colspan="3">Pengetahuan (KI-3)</th>
                        <th class="" colspan="3">Keterampilan (KI-4)</th>
                        <th class="" rowspan="2">Nilai Rata-rata</th>
                        <th class="" rowspan="2">Nilai Total</th>
                        <th class="" rowspan="2">Keterangan</th>

                    </tr>
                    <tr>
                        <th class="">Angka</th>
                        <th class="">Predikat</th>
                        <th class="">Deskripsi</th>
                        <th class="">Angka</th>
                        <th class="">Predikat</th>
                        <th class="">Deskripsi</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ($data_raport_siswa as $index => $nilai)
                        <tr class="">
                            <td class="">{{ $index + 1 }}</td>
                            <td class="">{{ $nilai->mata_pelajarans->nama_mata_pelajaran }}
                            </td>
                            <td class="">{{ $nilai->nilai_angka_pengetahuan }}
                            </td>
                            <td class="">
                                {{ $nilai->nilai_predikat_pengetahuan }}
                            </td>
                            <td class="">{{ $nilai->deskripsi_pengetahuan }}</td>
                            <td class="">
                                {{ $nilai->nilai_angka_keterampilan }}
                            </td>
                            <td class="">
                                {{ $nilai->nilai_predikat_keterampilan }}
                            </td>
                            <td class="">{{ $nilai->deskripsi_keterampilan }}</td>
                            <td class="">{{ $nilai->nilai_rata_rata }}</td>
                            <td class="">{{ $nilai->nilai_total }}</td>
                            <td class="">
                                @if ($nilai->keterangan == 'Terpenuhi')
                                    <span class="">Terpenuhi</span>
                                @elseif ($nilai->keterangan == 'Tidak Terpenuhi')
                                    <span class="">Tidak
                                        Terpenuhi</span>
                                @else
                                    <span class="">Belum
                                        di nilai</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="">
                        <td class="">#</td>
                        <td class=" " colspan="7">Jumlah</td>
                        <td class=" ">{{ $total_nilai_rata }}</td>
                        <td class=" ">{{ $total_nilai }}</td>
                        <td class="  "></td>
                    </tr>
                </tfoot>
            </table>
        </div>
