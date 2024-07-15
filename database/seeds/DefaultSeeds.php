<?php

use Illuminate\Database\Seeder;

class DefaultSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'=>'2v@admin.com',
            'name'=>'Adriana',
            'lastName'=>'Vargas',
            'nameComplete'=>'Adriana Vargas',
            'role'=>'Administrador P.',
            'password'=>bcrypt('tulogro2vexito2v'),
        ]);


    }
}
