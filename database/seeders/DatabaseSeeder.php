<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
USE Illuminate\Support\Facades\DB;
use \App\Models\User;
use \App\Models\Vervo;
use \App\Models\ImagenFondo;
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


                         ImagenFondo::create([
                            'imagen'=>'data:image/png;base64,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'
                        ]);
                        ImagenFondo::create([
                            'imagen'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRHgGe1NEzApUq7rUbGY2221O7vamMBAyWsUQ&usqp=CAU
                            '
                        ]);

                      
                        ImagenFondo::create([
                            'imagen'=>' https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQxUlVsTTmkHAq9lba8NmIjlN1NM1eFD66bx7v0ZlAlU8g2W85QCsnemY_2_Uvg5FI5D8&usqp=CAU   '
                            
                        ]);


                       

                $cantidad=5;
                 Vervo::factory($cantidad)->create();
                   
                 
                 
                  
          
                    
        
        
        
    }
}
