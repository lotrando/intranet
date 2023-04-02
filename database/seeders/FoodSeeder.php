<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear table

        DB::table('food')->truncate();

        // Polévky
        DB::table('food')->insert([
            'name'     => 'Hrachová polévka s uzeninou',
            'type'    => 'soup',
        ]);

        DB::table('food')->insert([
            'name'     => 'Rajská polévka s těstovinami',
            'type'    => 'soup',
        ]);

        DB::table('food')->insert([
            'name'     => 'Čočková s uzeninou',
            'type'    => 'soup',
        ]);

        DB::table('food')->insert([
            'name'     => 'Gulášová polévka',
            'type'    => 'soup',
        ]);

        DB::table('food')->insert([
            'name'     => 'Dršťková polévka',
            'type'    => 'soup',
        ]);

        DB::table('food')->insert([
            'name'     => 'Bramborová polévka s houbami',
            'type'    => 'soup',
        ]);

        // Jídla

        DB::table('food')->insert([
            'name'     => 'Bramboráky',
            'type'    => 'food',
        ]);

        DB::table('food')->insert([
            'name'     => 'Šunkofleky',
            'type'    => 'food',
        ]);

        DB::table('food')->insert([
            'name'     => 'Plněné papriky s rajskou omáčkou',
            'type'    => 'food',
        ]);

        DB::table('food')->insert([
            'name'     => 'Knedlíky s uzeným a zelí',
            'type'    => 'food',
        ]);

        DB::table('food')->insert([
            'name'     => 'Pekingské placičky',
            'type'    => 'food',
        ]);

        DB::table('food')->insert([
            'name'     => 'Palačinky s tvarohem',
            'type'    => 'food',
        ]);
    }
}
