<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'blog_name'=>'Wael dg',
            'phone_number'=>'20 152 636',
           'blog_email'=>'waeldghaisdg@gmail.com',
            'adresse'=>'nabeul'
        ]);
    }
}
