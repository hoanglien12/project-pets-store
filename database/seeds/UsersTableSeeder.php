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
        DB::table('users')->insert([
			['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('12345678'), 'address' => 'Ha Noi', 'phone' => '0396136933' ,'id_role' => 1, 'created_at' => new DateTime, 'updated_at' => new DateTime],
            ['name' => 'user', 'email' => 'user@gmail.com', 'password' => Hash::make('12345678'), 'address' => 'Ha Noi', 'phone' => '0636136933' ,'id_role' => 2, 'created_at' => new DateTime, 'updated_at' => new DateTime],
		]);	
    }
}
