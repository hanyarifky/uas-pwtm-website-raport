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
            <td class="px-6 py-3 text-gray-600 font-bold">Jenis Kelamin</td>
            <td class="px-6 py-3 text-gray-900">{{ Str::ucfirst($siswa->jenis_kelamin) }}</td>
        </tr>
        <tr>
            <td class="px-6 py-3 text-gray-600 font-bold">Tanggal Lahir</td>
            <td class="px-6 py-3 text-gray-900">{{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d-m-Y') }}</td>
        </tr>
        <tr>
            <td class="px-6 py-3 text-gray-600 font-bold">E-mail</td>
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