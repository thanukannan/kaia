<?php

use Illuminate\Database\Seeder;

class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'gokul',
            'email' => 'gokul@greefitech.com',
            'password' => bcrypt('123456'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Demo',
            'email' => 'admin@demo.com',
            'password' => bcrypt('123456'),
        ]);


        DB::table('clients')->insert([
            'clientname' => 'gokul',
            'contactperson' => 'gokul',
            'gst' => 'sdsdas',
            'emailid' => 'gokul@greefitech.com',
            'mobilenumber' => '1234567980',
            'address' => 'chennai',
        ]);
        DB::table('clients')->insert([
            'clientname' => 'gokul1',
            'contactperson' => 'gokul',
            'gst' => 'sdsdas',
            'emailid' => 'gokul1@greefitech.com',
            'mobilenumber' => '1234567980',
            'address' => 'chennai',
        ]);
        DB::table('clients')->insert([
            'clientname' => 'Demo',
            'contactperson' => 'Demo',
            'gst' => 'Demo123456987',
            'emailid' => 'admin@demo.com',
            'mobilenumber' => '1234567980',
            'address' => 'chennai',
        ]);
    }
}
