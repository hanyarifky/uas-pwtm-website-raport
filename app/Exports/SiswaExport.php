<?php

namespace App\Exports;

use App\Models\Siswa;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SiswaExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        //
        return view('admin.siswa.table', ['siswas' => Siswa::orderBy('nama', 'asc')->get()]);
    }
}
