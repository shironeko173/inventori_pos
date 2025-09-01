<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('satuan')->insert([
            'id_satuan' => 1,
            'nama_satuan' => 'pcs',
            'jmlh_satuan' => '1',
        ]);
    }
}
