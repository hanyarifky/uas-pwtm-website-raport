<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class SiswaSpesifikExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $siswa;

    public function __construct($siswa)
    {
        $this->siswa = $siswa;
    }

    public function view(): View
    {
        return view('admin.siswa.table-spesifik', ["siswa" => $this->siswa]);
    }
}
