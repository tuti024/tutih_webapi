<?php

use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Student::create([
        	'nama' =>'hani',
        	'jk' =>'P'
        ]);
        for ($i=0; $I <20; $i++){
            if ($i= <10) {
                $jk = 'P';
            }
            Student::create([
                'nama'=>. 'hani'.$i,
                'jk'=>$jk])
        }
    }
}
