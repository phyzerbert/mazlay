<?php

use Illuminate\Database\Seeder;

use App\Models\Bank;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bank::create([
            'name' => 'Maybank2u',
            'slug' => 'maybank2u',
            'image' => 'images/bank/maybank.jpg',
        ]);
        Bank::create([
            'name' => 'CIMB Clicks',
            'slug' => 'cimb_clicks',
            'image' => 'images/bank/cimb.jpg',
        ]);
        Bank::create([
            'name' => 'RHB Now',
            'slug' => 'rhb_now',
            'image' => 'images/bank/rhb.jpg',
        ]);
        Bank::create([
            'name' => 'PBe',
            'slug' => 'pbe',
            'image' => 'images/bank/public.jpg',
        ]);
        Bank::create([
            'name' => 'Hong Leong Connect',
            'slug' => 'hong_leong_connect',
            'image' => 'images/bank/hong_leong.jpg',
        ]);
        Bank::create([
            'name' => 'AmBank',
            'slug' => 'ambank',
            'image' => 'images/bank/ambank.jpg',
        ]);
        Bank::create([
            'name' => 'BSN',
            'slug' => 'bsn',
            'image' => 'images/bank/bsn.jpg',
        ]);
        Bank::create([
            'name' => 'HSBC',
            'slug' => 'hsbc',
            'image' => 'images/bank/hsbc.jpg',
        ]);
        Bank::create([
            'name' => 'OCBC',
            'slug' => 'ocbc',
            'image' => 'images/bank/ocbc.jpg',
        ]);
        Bank::create([
            'name' => 'UOB',
            'slug' => 'uob',
            'image' => 'images/bank/uob.jpg',
        ]);
        Bank::create([
            'name' => 'Standard Chartered',
            'slug' => 'standard_chartered',
            'image' => 'images/bank/standard.jpg',
        ]);
        Bank::create([
            'name' => 'Bank Islam',
            'slug' => 'bank_islam',
            'image' => 'images/bank/bank_islam.jpg',
        ]);
        Bank::create([
            'name' => 'Alliance Bank',
            'slug' => 'alliance_bank',
            'image' => 'images/bank/alliance.jpg',
        ]);
        Bank::create([
            'name' => 'Affin Bank',
            'slug' => 'affin_bank',
            'image' => 'images/bank/affin.jpg',
        ]);
    }
}
