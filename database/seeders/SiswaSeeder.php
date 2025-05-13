<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('siswa')->insert([
            'nama' => 'Ani',
            'nomor_induk' => '1000',
            'alamat' => 'Bantul',
            'created_at' => now() // Lebih baik pakai now() bawaan Laravel
        ]);

    }
}
