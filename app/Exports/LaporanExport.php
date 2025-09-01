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
            'C' => NumberFormat::FORMAT_CURRENCY_IDR,
            'D' => NumberFormat::FORMAT_CURRENCY_IDR,
            'E' => NumberFormat::FORMAT_CURRENCY_IDR,
            'F' => NumberFormat::FORMAT_CURRENCY_IDR,
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
