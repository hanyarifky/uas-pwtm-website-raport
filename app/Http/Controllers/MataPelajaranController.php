<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\MataPelajaran;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\MataPelajaranExport;
use Maatwebsite\Excel\Facades\Excel;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Mata Pelajaran!';
        $text = "Anda yakin ingin menghapus mata pelajaran ini?";
        confirmDelete($title, $text);

        return view('admin.mata_pelajaran.index', [
            'mapels' => MataPelajaran::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mata_pelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validate = $request->validate(
            [
                'kode_mata_pelajaran' => 'required|string|unique:mata_pelajarans,kode_mata_pelajaran',
                'nama_mata_pelajaran' => 'required|string',
                'nilai_kkm' => 'required',

            ]
        );

        try {
            $dataMapel = MataPelajaran::create($validate);

            $dataSiswa = Siswa::all();

            if (!$dataSiswa->isEmpty()) {
                foreach ($dataSiswa as $siswa) {
                    Nilai::create(
                        [
                            'siswa_id' => $siswa->id,
                            'mata_pelajaran_id' => $dataMapel->id,
                            'pts_ganjil' => 0,
                            'pts_genap' => 0,
                            'uas' => 0,
                            'ukk' => 0,
                            'nilai_total' => 0,
                            'keterangan' => 'belum di nilai'
                        ]
                    );
                }
            }




            alert()->success('Tambah Sukses', 'Berhasil Menambahkan Data');
            return redirect('/admin/mata-pelajaran');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Menambahkan Data');
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        return view(
            'admin.mata_pelajaran.edit',
            [
                'mataPelajaran' => $mataPelajaran
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $rulesData = [
            'nama_mata_pelajaran' => 'required|string',
            'nilai_kkm' => 'required',
        ];

        if ($request->kode_mata_pelajaran != $mataPelajaran->kode_mata_pelajaran) {
            $rulesData['kode_mata_pelajaran'] = 'required|string|unique:mata_pelajarans,kode_mata_pelajaran';
        }

        $validateData = $request->validate($rulesData);

        try {
            MataPelajaran::where('id', $mataPelajaran->id)->update($validateData);

            alert()->success('Update Sukses', 'Berhasil Mengupdate Data');
            return redirect('/admin/mata-pelajaran');
        } catch (\Exception $e) {
            alert()->error('Gagal', 'Gagal Mengupdate Data');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaran $mataPelajaran)
    {
        MataPelajaran::destroy($mataPelajaran->id);

        alert()->success('Berhasil di Hapus', 'Data Mata Pelajaran Berhasil di Hapus');
        return redirect('/admin/mata-pelajaran');
    }

    public function export_pdf()
    {
        $pdf = Pdf::loadView('pdf.mata-pelajaran-pdf', ["mapels" => MataPelajaran::orderBy('id', 'asc')->get()]);
        $pdf->setOption('isRemoteEnabled', true);
        $pdf->setOption('isHtml5ParserEnabled', true);
        $pdf->setOption('isPhpEnabled', true);
        return $pdf->setPaper('A4', 'landscape')->stream("data_mata_pelajaran.pdf");
    }

    public function export_excel()
    {
        // $data = MataPelajaran::orderBy('id', 'asc')->get();
        // return view('admin.mata_pelajaran.table', ['mapels' => $data]);
        return Excel::download(new MataPelajaranExport, "daftar_mata_pelajaran.xlsx");
    }
}
