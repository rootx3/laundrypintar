<?php

namespace App\Exports;

use App\Models\detail_transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return detail_transaksi::join('transaksi_15453', 'transaksi_15453.id', '=', 'detail_transaksi_15453.id_transaksi')->select('id_outlet', 'kode_invoice', 'id_member', 'tgl', 'status', 'dibayar', 'id_paket', 'qty')->get();
    }
    public function headings(): array
    {
        return ["Id outlet", "Invoice", "Id member", "Tanggal", "Status", "Bayar", "Id paket","Jumlah"];
    }
}