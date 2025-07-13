<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran</title>
    <style>
        @page{
            margin: 20px;
        }
        
        body{
            margin: 0;
            font-family: Arial, sans-serif;
        }
        
        table {
            margin: 0 auto;
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
            text-align: center;
        }
        
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ asset('images/logo-smpn-1-cisauk.png') }}" alt="Logo">
        <h1>SMPN 1 CISAUK</h1>
        <p class="sub-title">MJFG+88G, Cisauk, Kec. Cisauk, Kabupaten Tangerang, Banten 15341</p>
        <h2 class="title">DAFTAR MATA PELAJARAN</h2>
    </div>

    <table>
        <thead>
            <tr>
                {{-- <th>No</th> --}}
                <th>No</th>
                <th>Kode Mata Pelajaran</th>
                <th>Nama Mata Pelajaran</th>
                <th>Nilai KKM</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapels as $mapel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mapel->kode_mata_pelajaran }}</td>
                    <td>{{ $mapel->nama_mata_pelajaran }}</td>
                    <td>{{ $mapel->nilai_kkm }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
