<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User;
        $user->firstname = 'Water';
        $user->lastname = 'Water';
        $user->gender = 'Male';
        $user->address = 'Balilihan';
        $user->email = 'water@balilihan.com';
        $user->password = \Hash::make('123123');
        $user->save();
        // $this->call(UsersTableSeeder::class);
        for ($i=0; $i < 200; $i++) { 
        	
        	$level = new \App\Level;
        	$level->timestamps = false;
        	$level->centimeter = rand(20,100);
            $level->number = rand(1,6);
        	$level->created_at = \Carbon\Carbon::now()->addDays(rand(1,29))->addMinutes(rand(0,60 * 23))->addSeconds(rand(0, 60));
        	$level->save();

        }
    }
}