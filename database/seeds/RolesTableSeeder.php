<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
			['name' => 'admin', 'description' => 'This is admin.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
			['name' => 'user', 'description' => 'This is user.', 'created_at' => new DateTime, 'updated_at' => new DateTime],
		]);	
    }
}
