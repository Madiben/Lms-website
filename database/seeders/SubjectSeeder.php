<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->truncate();

        //generate 15 random
        //Task::factory()->count(15)->create();
        //Task::factory(10)->create();

        //generate 15 random
        Subject::factory()->count(4)->hasTasks(5)->create();
    }
}
