<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::Create([
            'name' => 'Malaysia',
            'code' => 'my',
            'phone_code' => '+60',
            'flag' => 'images/flag/my.png',
        ]);

        Country::Create([
            'name' => 'Singapore',
            'code' => 'sg',
            'phone_code' => '+65',
            'flag' => 'images/flag/sg.png',
        ]);
    }
}
