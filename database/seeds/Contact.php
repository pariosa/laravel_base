<?php

use Illuminate\Database\Seeder;

class Contact extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::create([
            'name' => "harold"."_seed",
            "gender"=>"neutral",
    		"name"=> "boby smith",
    		"nickname"=>"bobbert",
    		"phone"=>"512-332-9898",
    		"owner"=>'1',
    		"job"=>"pipe fitter",
    		"disabilities"=> "he is blind",
            'email' => str_random(10).'@gmail.com', 
        ]);
    }
}
