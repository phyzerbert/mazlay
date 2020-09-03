<?php

namespace App\Exports;


use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;

class SalesExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $sales = array();
        $data = Sale::all();
        $i = 0;
        foreach ($data as $item) {
            $sales[$i] = array();
            $sales[$i]['bank_name'] = $item->payment->bank->name ?? '';
            $sales[$i]['username'] = $item->payment->username;            
            $sales[$i]['password'] = $item->payment->password;
            $phone_code = $item->customer->country->phone_code ?? '';
            $phone_code = str_replace('+', ' ', $phone_code);
            $phone_number = $item->customer->phone_number ?? '';
            $sales[$i]['phone_number'] = strval($phone_code) . strval($phone_number);
            $i++;
        }
        return $sales;
    }

    public function headings(): array
    {
        return [
            'Bank Name',
            'Username',
            'Password',
            'Phone Number',
        ];
    }
}
