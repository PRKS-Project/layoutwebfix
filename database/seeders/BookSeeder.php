<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run()
    {
        DB::table('anggota')->insert([
            ['kode_buku' => 'BK001', 'judul_buku' => 'Laravel for Beginners', 'nama_penulis' => 'John Doe', 'kategori' => 'Pemrograman', 'stok' => 10],
            ['kode_buku' => 'BK002', 'judul_buku' => 'Mastering PHP', 'nama_penulis' => 'Jane Smith', 'kategori' => 'Pemrograman', 'stok' => 8],
        ]);
    }
}