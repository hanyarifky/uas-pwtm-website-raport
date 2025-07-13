<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Exports\SiswaExport;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data Siswa?!';
        $text = "Anda yakin ingin menghapus data siswa ini?";
        confirmDelete($title, $text);

        return view(
            'admin.siswa.index',
            [
                'siswas' => Siswa::orderBy('nama', 'asc')->get()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validateData = $request->validate(
            [
                'nis' => 'required|string|max:10|unique:siswas,nis',
                'nama' => 'required|string',
                'jenis_kelamin' => 'required|in:laki-laki,perempuan',
                'tanggal_lahir' => 'required|date',
                'alamat' => 'required',
                'email' => 'required|email|unique:siswas,email',
                'nomor_telepon' => 'required|max:15',
                'status' => 'required|in:aktif,tidak aktif'
            ]
        );

        // dd($request->all());

        try {

            // Menyimpan data Siswa
            $siswa = Siswa::create($validateData);

            // Ambil data mata pelajaran
            $mapels = MataPelajaran::all();

            // Menambahkan nilai untuk setiap siswa sesuai data mata pelajaran
            // jadi nanti setiap siswa akan mempunyai nilai untuk tiap masing-masing mata pelajaran
            foreach ($mapels as $mapel) {
                Nilai::create(
                    [
                        'siswa_id' => $siswa->id,
                        'mata_pelajaran_id' => $mapel->id,
                        'nilai_angka_pengetahuan' => 0,
                        'nilai_predikat_pengetahuan' => "-",
                        'deskripsi_pengetahuan' => "",
                        'nilai_angka_keterampilan' => 0,
                        'nilai_predikat_keterampilan' => "-",
                        'deskripsi_keterampilan' => "",
                        'nilai_rata_rata' => 0,
                        'nilai_total' => 0,
                        'keterangan' => 'Belum di nilai'
                    ]
                );
            }

            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return redirect('/admin/siswa');
        } catch (\Exception $th) {
            alert()->error('Tambah Gagal', 'Gagal Menambahkan Data');
            return redirect('/admin/siswa');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        return view('admin.siswa.show', ['siswa' => $siswa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view(
            'admin.siswa.edit',
            [
                'siswa' => $siswa
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        // dd($request->all());

        $rulesData = [
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nomor_telepon' => 'required|max:15',
            'status' => 'required|in:aktif,tidak aktif'
        ];

        if ($request->nis != $siswa->nis) {
            $rulesData['nis'] = 'required|string|max:10|unique:siswas,nis';
        }

        if ($request->email != $siswa->email) {
            $rulesData['email'] = 'required|email|unique:siswas,email';
        }

        $validateData = $request->validate($rulesData);

        try {
            Siswa::where('id', $siswa->id)->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect('/admin/siswa');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        Siswa::destroy($siswa->id);

        alert()->success('Berhasil di Hapus', 'Data Siswa Berhasil di Hapus');
        return redirect('/admin/siswa');
    }

    public function export_pdf()
    {
        $pdf = Pdf::loadView('pdf.siswa-pdf', ["siswas" => Siswa::orderBy('nama', 'asc')->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("data_siswa.pdf");
    }

    public function export_excel()
    {
        // $data = Siswa::orderBy('nama', 'asc')->get();
        // return view('admin.siswa.table', ['siswas' => $data]);
        return Excel::download(new SiswaExport, "daftar_siswa.xlsx");
    }
}
