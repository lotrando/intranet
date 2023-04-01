<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear table

        DB::table('types')->truncate();

        // Types

        DB::table('types')->insert([
            'type_name'     => 'Odstávky a servis',
            'type_route'    => 'oznameni.servis',
            'type_color'    => 'azure',
            'svg_icon'      => '<svg class="icon text-azure" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Změny služeb',
            'type_route'    => 'oznameni.akord',
            'type_color'    => 'yellow',
            'svg_icon'      => '<svg class="icon text-yellow" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Informace',
            'type_route'    => 'oznameni.informace',
            'type_color'    => 'azure',
            'svg_icon'      => '<svg class="icon text-azure" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Semináře',
            'type_route'    => 'oznameni.seminare',
            'type_color'    => 'purple',
            'svg_icon'      => '<svg class="icon text-purple" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Akord',
            'type_route'    => 'oznameni.akord',
            'type_color'    => 'blue',
            'svg_icon'      => '<svg class="icon text-blue" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Kultura',
            'type_route'    => 'oznameni.kultura',
            'type_color'    => 'pink',
            'svg_icon'      => '<svg class="icon text-pink" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Normální',
            'type_route'    => 'oznameni.normalni',
            'type_color'    => 'muted',
            'svg_icon'      => '<svg class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);

        DB::table('types')->insert([
            'type_name'     => 'Dlohodobé',
            'type_route'    => 'oznameni.important',
            'type_color'    => 'red',
            'svg_icon'      => '<svg class="icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><line x1="3" y1="21" x2="21" y2="21"></line><path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16"></path><path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path><line x1="10" y1="9" x2="14" y2="9"></line><line x1="12" y1="7" x2="12" y2="11"></line></svg>',
        ]);
    }
}
