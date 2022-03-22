<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $schools = [
            [	
            	'name' => 'BIS',
            ],
            [	
            	'name' => 'MIS',
            ],
            [	
            	'name' => 'GIS',
            ],
        ];

        DB::table('schools')->insert($schools);
    }
}
