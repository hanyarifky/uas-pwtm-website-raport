<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
        @page{
            margin: 30px;
        }
        
        body{
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        table {
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header img {
            width: 80px;
            height: auto;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            text-align: left;
        }
        
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('images/logo-smpn-1-cisauk.png') }}" alt="Logo">
        <h1>SMPN 1 CISAUK</h1>
        <p class="sub-title">MJFG+88G, Cisauk, Kec. Cisauk, Kabupaten Tangerang, Banten 15341</p>
        <h2 class="title">DAFTAR SISWA</h2>
    </div>

    <table>
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>No.Absen</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>E-mail</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswas as $siswa)
                <tr>
                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ Str::ucfirst($siswa->jenis_kelamin) }}</td>
                    <td style="white-space: nowrap;">{{ $siswa->tanggal_lahir }}</td>
                    <td>{{ $siswa->email }}</td>
                    <td>{{ $siswa->nomor_telepon }}</td>
                    <td>{{ $siswa->alamat }}</td>
                    <td>{{ $siswa->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
