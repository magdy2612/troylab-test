<?php

use App\School;
use App\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$schools = DB::table('schools')->select('id')->get()->keyBy('id')->toArray();
        $students = [
            [	
            	'name' => 'Ahmed',
            	'school_id' => array_rand($schools, 1),
            ],
            [	
            	'name' => 'Mohamed',
            	'school_id' => array_rand($schools, 1),
            ],
            [	
            	'name' => 'Magdy',
            	'school_id' => array_rand($schools, 1),
            ],
        ];
        $model = new Student();
        foreach ($students as $key => $student) {
        	$model->create($student);
        }
    }
}
