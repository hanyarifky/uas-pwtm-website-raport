<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background-color: #f4f4f9; */
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            width: 80px;
            height: auto;
        }

        .header h1,
        .header h2 {
            margin: 0;
            color: #333;
        }

        .header p.sub-title {
            font-size: 14px;
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
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f7fafc;
            color: #333;
        }

        td {
            color: #555;
        }

        tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .btn {
            background-color: #3182ce;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            text-align: center;
        }

        .btn:hover {
            background-color: #2b6cb0;
        }

        .status {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .status-success {
            background-color: #48bb78;
            color: white;
        }

        .status-failed {
            background-color: #f56565;
            width: 100%;
            color: white;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <div class="header">
        <img src="{{ asset('images/logo-smpn-1-cisauk.png') }}" alt="Logo">
        <h1>SMPN 1 CISAUK</h1>
        <p class="sub-title">MJFG+88G, Cisauk, Kec. Cisauk, Kabupaten Tangerang, Banten 15341</p>
        <h2>Data Siswa</h2>
    </div>

    <div class="container">

        <!-- Student Data Section -->
        <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md sm:rounded-lg">
            <h4 class="text-xl font-bold dark:text-white mb-4">Data Siswa</h4>
            <table class="min-w-full bg-white rounded-lg">
                <tbody>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">NIS</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->nis }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Nama</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->nama }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Jenis Kelamin</td>
                        <td class="px-6 py-3 text-gray-900">{{ Str::ucfirst($siswa->jenis_kelamin) }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Tanggal Lahir</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->tanggal_lahir }}</td>
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
                        <td class="px-6 py-3 text-gray-600 font-bold">Alamat</td>
                        <td class="px-6 py-3 text-gray-900">{{ $siswa->alamat }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-3 text-gray-600 font-bold">Status</td>
                        <td class="px-6 py-3 text-gray-900">{{ ucfirst($siswa->status) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Report Card Table -->
        {{-- <div class="relative p-5 mb-8 overflow-x-auto dark:bg-gray-800 shadow-md sm:rounded-lg">
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
                            <td class="px-6 py-4">{{ $nilai->mata_pelajarans->nilai_kkm }}</td>
                            <td class="px-6 py-4">{{ $nilai->pts_ganjil }}</td>
                            <td class="px-6 py-4">{{ $nilai->pts_genap }}</td>
                            <td class="px-6 py-4">{{ $nilai->uas }}</td>
                            <td class="px-6 py-4">{{ $nilai->ukk }}</td>
                            <td class="px-6 py-4">{{ $nilai->nilai_total }}</td>
                            <td class="text-center">
                                @if ($nilai->mata_pelajarans->nilai_kkm < $nilai->nilai_total)
                                    <span class="status status-success">Terpenuhi</span>
                                @else
                                    <span class="status status-failed">Tidak Terpenuhi</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> --}}

        <!-- Action Buttons -->
        {{-- <div class="text-center mt-6">
            <a href="/admin/raport" class="btn">Kembali</a>
            <a href="{{ route('raport.cetak_pdf', $siswa->id) }}" class="btn">Cetak PDF</a>
        </div> --}}

    </div>

</body>

</html>
