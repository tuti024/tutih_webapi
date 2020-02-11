<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Teacher::create([
        	'nama' =>'ranidut',
        	'jk' =>'P',
        	'guru_mapel' =>'matematika'
        ]);
    }
}
