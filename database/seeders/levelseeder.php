<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class levelseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['level_id'=>1,'level_user'=>'ADM','level_nama'=>'Administrator'],
            ['level_id'=>2,'level_user'=>'MNG','level_nama'=>'Manajer'],
            ['level_id'=>3,'level_user'=>'STF','level_nama'=>'Staf/kasir'],
        ];
        DB::table('m_level')->insert($data);
    }
}
