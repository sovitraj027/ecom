<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $colors = [
        [
        'name' => 'Black',
        
        ],
        [
        'name' => 'Blue',
        
        ],
        [
        'name' => 'Green',
        
        ],
        [
        'name' => 'Orange',
        
        ],
        [
        'name' => 'Purple',
        
        ],
        [
        'name' => 'Red',
      
        ],

        ];

        DB::table('colors')->insert($colors);
    }
}
