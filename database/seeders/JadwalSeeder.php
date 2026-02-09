<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jadwals')->insert([
            [
                'hari' => 'Senin',
                'waktu_mulai' => '08:00',
                'waktu_selesai' => '09:40',
                'mata_kuliah' => 'Calculus I',
                'program_studi' => 'Mathematics',
                'kelas' => 'A',
                'dosen1' => 'Dr. Ahmad',
                'dosen2' => 'Dr. Budi',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'hari' => 'Selasa',
                'waktu_mulai' => '10:00',
                'waktu_selesai' => '11:40',
                'mata_kuliah' => 'Statistics',
                'program_studi' => 'Statistics',
                'kelas' => 'B',
                'dosen1' => 'Dr. Siti',
                'dosen2' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'hari' => 'Rabu',
                'waktu_mulai' => '13:00',
                'waktu_selesai' => '14:40',
                'mata_kuliah' => 'Linear Algebra',
                'program_studi' => 'Mathematics',
                'kelas' => 'A',
                'dosen1' => 'Dr. Andi',
                'dosen2' => 'Dr. Rina',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
