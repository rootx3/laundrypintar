<?php

namespace Database\Seeders;

use App\Models\paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      

        paket::create([
            'id_outlet' => '1',
            'nama_paket' => 'kaos',
            'jenis' => 'kiloan',
            'harga' => '1000'
        ]);
        paket::create([
            'id_outlet' => '2',
            'nama_paket' => 'selimut',
            'jenis' => 'kiloan',
            'harga' => '2000'
        ]);
        paket::create([
            'id_outlet' => '3',
            'nama_paket' => 'kiloan',
            'jenis' => 'kiloan',
            'harga' => '30000'
        ]);
        paket::create([
            'id_outlet' => '4',
            'nama_paket' => 'lain',
            'jenis' => 'kiloan',
            'harga' => '4000'
        ]);
    }
}