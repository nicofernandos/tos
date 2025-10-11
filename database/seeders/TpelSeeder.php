<?php 


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tpelajaran;
use Illuminate\Support\Carbon;

class TpelSeeder extends Seeder
{
    public function run()
    {
        $pelajaranList = [
            'Agama',
            'IPS',
            'Pendidikan Pancasila',
            'Bahasa Inggris',
            'Bahasa Indonesia',
            'Seni Musik',
            'Matematika',
            'PJOK',
            'IPA Fisika',
            'Bahasa Mandarin',
            'IPA Biologi',
            'Informatik',
        ];

        foreach ($pelajaranList as $pel){
            Tpelajaran::create([
                'tin' => 4,
                'idta' => 2,
                'nam' => $pel,
                'jen' => 4,
                'idk' => 354,
                'Ket' => 'Pelajaran Semester Ganjil',
                'sta' => 0,
                'rev' => 0,
            ]);
        }

    }
}