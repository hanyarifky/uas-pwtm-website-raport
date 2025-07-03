<?php

namespace App\Exports;

use App\Models\MataPelajaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MataPelajaranExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.mata_pelajaran.table', ['mapels' => MataPelajaran::orderBy('id', 'asc')->get()]);
    }
}
