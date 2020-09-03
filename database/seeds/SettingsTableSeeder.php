<?php

use Illuminate\Database\Seeder;

use App\Models\Setting;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'email' => 'helpcoddelivery@gmail.com',
            'whatsapp' => '+60177163578',
            'phone_number' => '+60177163578',
            'total_amount' => 'Rm 2.00',
            'header_text' => 'Free 5 Day Shipping On Online Orders 100+',
            'invoice_description' => 'Rm 2.00 will be charged first to confirm your order and pay your remaining balance once you have received your order',
        ]);
    }
}
