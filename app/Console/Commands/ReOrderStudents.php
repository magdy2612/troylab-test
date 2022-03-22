<?php

namespace App\Console\Commands;

use Event;
use App\School;
use App\Student;
use Illuminate\Console\Command;
use App\Events\SendReOrderEmail;
use Illuminate\Support\Facades\DB;

class ReOrderStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:re-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ReOrder Students';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        $schools = DB::select('SELECT id FROM schools WHERE deleted_at IS NULL');
        foreach ($schools as $school) {
            $students = DB::select("SELECT id, `order` FROM students WHERE school_id = $school->id AND deleted_at IS NULL");
            $students_count = count($students);
            if($students_count == 0)
                continue;
            if($students_count == (int) end($students)->order)
                continue;
            else{
                foreach ($students as $key => $student) {
                    $update = Student::findOrFail($student->id);
                    $update->update(['order' => $key + 1]);
                }
            }
        }
        // Event::dispatch(new SendReOrderEmail());
    }
}
