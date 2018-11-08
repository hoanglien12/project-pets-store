<?php

use Illuminate\Database\Seeder;

class SiteConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_config')->insert([
			['label' => 'site_phone', 'type' => 0,'value' => '0971006294' ,'created_at' => new DateTime, 'updated_at' => new DateTime],
			['label' => 'site_address', 'type' => 0,'value' => '45 Võ Chí Công' ,'created_at' => new DateTime, 'updated_at' => new DateTime],
		]);	
    }
}
