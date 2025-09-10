<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RumahSakitSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rumah_sakits')->insert([
            [
                'nama' => 'RS Sehat Selalu',
                'alamat' => 'Jl. Merdeka No. 10',
                'email' => 'rssehat@gmail.com',
                'telepon' => '081234567890',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'RS Harapan Kita',
                'alamat' => 'Jl. Pahlawan No. 22',
                'email' => 'rsharapankita@gmail.com',
                'telepon' => '081234567891',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama' => 'RS Mitra Medika',
                'alamat' => 'Jl. Sudirman No. 15',
                'email' => 'rsmitra@gmail.com',
                'telepon' => '081234567892',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
