<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriversSeeder extends Seeder
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
             'name' => 'Kimi Raikkonen',
             'city' => 'Helsinki'
         ],
        [
             'name' => 'Niki Lauda',
             'city' => 'Vienna'
         ],
        [
             'name' => 'Michael Schumacher',
             'city' => 'Munich'
         ],
        [
             'name' => 'Ayrton Senna',
             'city' => 'Sao Paulo'
         ]

     ];
    foreach ($data as $key => $value) {
        DB::table('drivers')->insert($value);
    }
    }
}
