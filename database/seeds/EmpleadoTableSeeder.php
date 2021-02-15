<?php

use Illuminate\Database\Seeder;

class EmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'admin',
            'display_name'=>'Administrador',
            'description'=>'Administra todos los modulos',
            'status'=>1,   
        ]);
        
        DB::table('roles')->insert([
            'name'=>'cocin',
            'display_name'=>'Cocinero',
            'description'=>'Preparación de Platos',
            'status'=>1,   
        ]);
        
        DB::table('roles')->insert([
            'name'=>'meser',
            'display_name'=>'Mesero',
            'description'=>'Venta de Platos',
            'status'=>1,   
        ]);
        
        DB::table('Users')->insert([
            'ci'=>'6648695',
            'email'=>'daniel_215s@hotmail.com',
            'name' => 'Daniel',
            'first_name'=>'Sanchez',
            'last_name'=>'Martinez',
            'username'=>'admin',
            'password' => bcrypt('daniel'),
            'status'=>1
        ]);
        DB::table('Users')->insert([
            'ci'=>'6648696',
            'email'=>'daniel666sm@gmail.com',
            'name' => 'NCocina',
            'first_name'=>'PCocina',
            'last_name'=>'MCocina',
            'username'=>'cocinero',
            'password' => bcrypt('daniel666s'),
            'status'=>1, 

        ]);
        DB::table('Users')->insert([
            'ci'=>'6648697',
            'email'=>'cachotro@gmail.com',
            'name' => 'NMesero',
            'first_name'=>'PMesero',
            'last_name'=>'MMesero',
            'username'=>'mesero',
            'password' => bcrypt('daniel666s'),
            'status'=>1, 
        ]);
        

    }
}
