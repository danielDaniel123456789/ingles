<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
USE Illuminate\Support\Facades\DB;
use \App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                User::truncate();
           
         
                User::create([
                             'name'=>'Daniel',
                             'email' => 'danielsrbu@gmail.com',
                             'password' => bcrypt('123123123'),
                         ]);


          
        
        
        
    }
}
