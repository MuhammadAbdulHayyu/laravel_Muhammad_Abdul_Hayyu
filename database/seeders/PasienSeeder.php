<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasienSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pasiens')->insert([
            [
                'id' => 1,
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Melati No. 1',
                'telepon' => '0811111111',
                'rumah_sakit_id' => 1,
                'created_at' => '2025-09-09 22:53:15',
                'updated_at' => '2025-09-09 22:53:15',
            ],
            [
                'id' => 2,
                'nama' => 'Siti Aminah',
                'alamat' => 'Jl. Kenanga No. 2',
                'telepon' => '0812222222',
                'rumah_sakit_id' => 1,
                'created_at' => '2025-09-09 22:53:15',
                'updated_at' => '2025-09-09 22:53:15',
            ],
            [
                'id' => 3,
                'nama' => 'Andi Wijaya',
                'alamat' => 'Jl. Mawar No. 3',
                'telepon' => '0813333333',
                'rumah_sakit_id' => 2,
                'created_at' => '2025-09-09 22:53:15',
                'updated_at' => '2025-09-09 22:53:15',
            ],
            [
                'id' => 4,
                'nama' => 'Dewi Lestari',
                'alamat' => 'Jl. Anggrek No. 4',
                'telepon' => '0814444444',
                'rumah_sakit_id' => 3,
                'created_at' => '2025-09-09 22:53:15',
                'updated_at' => '2025-09-09 22:53:15',
            ],
            [
                'id' => 5,
                'nama' => 'Agus Saputra',
                'alamat' => 'Jl. Dahlia No. 5',
                'telepon' => '0815555555',
                'rumah_sakit_id' => 2,
                'created_at' => '2025-09-09 22:53:15',
                'updated_at' => '2025-09-09 22:53:15',
            ],
        ]);
    }
}
