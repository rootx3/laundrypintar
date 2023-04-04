<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\member;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        member::create([
            'nama' => 'Phil Franco',
            'jenis_kelamin' => 'Laki-laki',
            'tlp' => '089765450098',
            'alamat' => 'Jl Raya Bogor Km 30, Jakarta'
        ]);
        member::create([
            'nama' => 'Muriel Weiss',
            'jenis_kelamin' => 'Perempuan',
            'tlp' => '089765450099',
            'alamat' => 'Jl Sumatra 50, Jawa Barat'
        ]);
        member::create([
            'nama' => 'Jarrett Wilson',
            'jenis_kelamin' => 'Perempuan',
            'tlp' => '089765450099',
            'alamat' => 'Jl Guru Patimpus 15 D, Sumatera Utara'
        ]);
        member::create([
            'nama' => 'Coleen Savage',
            'jenis_kelamin' => 'Laki-laki',
            'tlp' => '089765450098',
            'alamat' => 'Jl Jati Padang 2 18A RT 005/03, Dki Jakarta'
        ]);


        user::create([
            'name' => 'admin',
            'username' => 'admin',
            'role' => 'admin',
            'password'=>bcrypt('admin123'),
            'id_outlet'=>'1'
        ]);

        user::create([
            'name' => 'admin2',
            'username' => 'admin2',
            'role' => 'admin',
            'password'=>bcrypt('admin2'),
            'id_outlet'=>'2'
        ]);
        user::create([
            'name' => 'kasir',
            'username' => 'kasir',
            'role' => 'kasir',
            'password'=>bcrypt('kasir123'),
            'id_outlet'=>'1'
        ]);
        user::create([
            'name' => 'owner',
            'username' => 'owner',
            'role' => 'owner',
            'password'=>bcrypt('owner123'),
            'id_outlet'=>'1'
        ]);
    }
}