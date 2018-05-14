<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RadarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        [
             'date' => new DateTime(),
             'number' => 'AAA001',
             'distance' => 1000,
             'time' => 100
         ],
        [
             'date' => new DateTime(),
             'number' => 'BBB001',
             'distance' => 100,
             'time' => 1000
         ],
        [
             'date' => new DateTime(),
             'number' => 'CCC001',
             'distance' => 100,
             'time' => 100
         ]
     ];
    foreach ($data as $key => $value) {
        DB::table('radars')->insert($value);
    }
    }

}
