<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class LaporanExport implements FromView, ShouldAutoSize, WithColumnFormatting
{
    public function columnFormats(): array
    {
        return [
            'C' => '"Rp"#,##0_-',
            'D' => '"Rp"#,##0_-',
            'E' => '"Rp"#,##0_-',
            'F' => '"Rp"#,##0_-',
        ];
    }

    
    public function __construct($data,$awal,$akhir)
    {

        $this->data = $data;
        $this->awal = $awal;
        $this->akhir = $akhir;
    }
 
    public function view() : View
    {

        return view('laporan.excel', [
            'data'=>$this->data,
            'awal'=>$this->awal,
            'akhir'=>$this->akhir,
        ]);
    }
}
