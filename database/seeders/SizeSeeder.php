<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes=[

        
           [
           'title' => 'Xl',

           ],
           [
           'title' => 'S',

           ],
           [
           'title' => 'Xs',

           ],
           [
           'title' => 'XXl',

           ],
           [
           'title' => 'XXX',

           ],
          
           ];

           DB::table('sizes')->insert($sizes);
    }
}
