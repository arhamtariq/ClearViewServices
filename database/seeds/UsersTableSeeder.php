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
            'username' => 'test',
            'first_name' => Str::random(10),
            'company_code'=>123,
            'last_name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => bcrypt('secret'),
            'phone_number'=>1234,
            'address'=>Str::random(10),
            'city'=>Str::random(12),
            'zip_code'=>421,
            'role'=>'admin',
        ]);
    }
}
