<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=> 'admin@gmail.com',
            'password'=>bcrypt('abc123'),
            'address'=>'Admin',
            'restaurant'=>'False',
            'accepted'=>'True',
        ]);
        DB::table('users')->insert([
            'name'=>'Hip Hoddlys Food Emporium',
            'email'=> 'HHFE@gmail.com',
            'password'=>bcrypt('abc123'),
            'address'=>'8 Trinkle Drive, Robina, Queensland',
            'restaurant'=>'True',
            'accepted'=>'True',
        ]);
        DB::table('users')->insert([
            'name'=>'DonMac',
            'email'=> 'DonMac@gmail.com',
            'password'=>bcrypt('abc123'),
            'address'=>'9 Banana Drive, Robina, Queensland',
            'restaurant'=>'True',
            'accepted'=>'False',
        ]);
        DB::table('users')->insert([
            'name'=>'Brian',
            'email'=> 'BrianHues@gmail.com',
            'password'=>bcrypt('abc123'),
            'address'=>'7 Trundle Avenue, Robina, Queensland',
            'restaurant'=>'False',
            'accepted'=>'False',
        ]);

    }
}
