<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa dan Rapor</title>
    <style>
        @page {
            margin: 30px;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            font-size: 13px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            width: 110px;
            height: auto;
        }

        .header h1 {
            margin: 0;
            color: #333;
            font-size: 32px;
        }

        .header h2 {
            margin: 0;
            color: #333;
            font-size: 24px;
        }

        .header p.sub-title {
            font-size: 18px;
            color: #555;
        }

        .container {
            width: 90%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            font-size: 13px;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f0f4f8;
            color: #333;
            text-align: center;
        }

        td {
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .status {
            padding: 8px 14px;
            border-radius: 5px;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-success {
            background-color: #48bb78;
            color: white;
        }

        .status-failed {
            background-color: #f56565;
            color: white;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 15px;
            font-weight: bold;
        }

        .total-row td {
            font-weight: bold;
            text-align: right;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
                font-size: 13px;
            }

            .container {
                width: 100%;
                padding: 10px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                font-size: 13px;
            }

            th,
            td {
                padding: 10px;
                font-size: 13px;
            }

            .header h1 {
                font-size: 30px;
            }

            .header h2 {
                font-size: 22px;
            }

            .header p.sub-title {
                font-size: 16px;
            }

            .header img {
                width: 100px;
            }

            .status-success {
                background-color: #48bb78 !important;
                color: white !important;
            }

            .status-failed {
                background-color: #f56565 !important;
                color: white !important;
            }
        }
    </style>




</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <img src="{{ asset('images/logo-smpn-1-cisauk.png') }}" alt="Logo">
        <h1>SMPN 1 CISAUK</h1>
        <p class="sub-title">MJFG+88G, Cisauk, Kec. Cisauk, Kabupaten Tangerang, Banten 15341</p>
        <h2>Data Siswa dan Raport</h2>
    </div>

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
        <br><br><br><br><br><br><br><br><br><br><br>

        <!-- Report Card Table -->
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
                            <td class="">{{ $nilai->mata_pelajarans->nama_mata_pelajaran }}</td>
                            <td class="">{{ $nilai->nilai_angka_pengetahuan }}</td>
                            <td class="">{{ $nilai->nilai_predikat_pengetahuan }}</td>
                            <td class="">{{ $nilai->deskripsi_pengetahuan }}</td>
                            <td class="">{{ $nilai->nilai_angka_keterampilan }}</td>
                            <td class="">{{ $nilai->nilai_predikat_keterampilan }}</td>
                            <td class="">{{ $nilai->deskripsi_keterampilan }}</td>
                            <td class="">{{ $nilai->nilai_rata_rata }}</td>
                            <td class="">{{ $nilai->nilai_total }}</td>
                            <td class="">
                                @if ($nilai->keterangan == 'Terpenuhi')
                                    <span class="">Terpenuhi</span>
                                @elseif ($nilai->keterangan == 'Tidak Terpenuhi')
                                    <span class="">Tidak Terpenuhi</span>
                                @else
                                    <span class="">Belum di nilai</span>
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

    </div>

</body>

</html>
