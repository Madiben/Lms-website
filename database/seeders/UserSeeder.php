<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

    User::create([
      'name' => 'Steve doct',
      'email' => 'steve@gmail.com',
      'password' => Hash::make('123456aa'),
      'is_teacher'=> '1',
    ]);
    User::create([
      'name' => 'Arnold Tome',
      'email' => 'tome@gmail.com',
      'password' => Hash::make('123456cc'),
      'is_teacher'=> '1',
    ]);
    }
}
