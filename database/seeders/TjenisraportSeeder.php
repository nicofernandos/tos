<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TjenisraportSeeder extends Seeder
{
    public function run()
    {
        DB::connection('maiadminmedan')->table('tjenisraport')->insert([
            ['nam' => 'Mid Semester Ganjil'],
            ['nam' => 'Mid Semester Genap'],
            ['nam' => 'Akhir Semester Ganjil'],
            ['nam' => 'Akhir Semester Genap'],
        ]);
    }
}
