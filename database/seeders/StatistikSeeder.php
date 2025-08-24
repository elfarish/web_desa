<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ tambahkan baris ini

class StatistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statistiks')->insert([
            ['icon' => 'bi-people-fill', 'count' => 13163, 'label' => 'Jumlah Penduduk'],
            ['icon' => 'bi-house-fill', 'count' => 0, 'label' => 'Kepala Keluarga'],
            ['icon' => 'bi-gender-male', 'count' => 6602, 'label' => 'Laki-laki'],
            ['icon' => 'bi-gender-female', 'count' => 6561, 'label' => 'Perempuan'],
        ]);
    }
}
