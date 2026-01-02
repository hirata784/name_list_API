<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NamesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '太郎'
        ];
        DB::table('names')->insert($param);
        $param = [
            'name' => '次郎'
        ];
        DB::table('names')->insert($param);
    }
}
