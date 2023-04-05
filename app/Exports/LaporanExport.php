<?php

namespace App\Exports;

use App\Models\detail_transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return detail_transaksi::join('transaksi_15453','transaksi_15453.id','=','detail_transaksi_15453.id_transaksi')->get();
    }
}