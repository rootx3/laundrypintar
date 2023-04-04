<?php

namespace Database\Seeders;

use App\Models\outlet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        outlet::create([
            'nama' => 'outlet1',
            'alamat' => ' Jl Raya Walisongo Km 9, Jawa Tengah',
            'tlp' => '089565478392',
        ]);
        outlet::create([
            'nama' => 'outlet2',
            'alamat' => ' Jl Kuala Mas XV 727, Jawa Tengah',
            'tlp' => '089565478392',
        ]);
        outlet::create([
            'nama' => 'outlet3',
            'alamat' => ' JL. Cideng Barat No. 65B, GambirJL. Cideng Barat No. 65B, Gambir',
            'tlp' => '089565478392',
        ]);
        outlet::create([
            'nama' => 'outlet4',
            'alamat' => ' Jl Satria Raya II/1, Jawa Barat',
            'tlp' => '089565478392',
        ]);
    }
}