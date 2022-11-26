<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [
                'name' => 'Adda Pidcock',
                'email' => 'apidcock0@shinystat.com',
                'mobile' => '225-319-0695',
                'address' => '2597 Summit Avenue',
                'gender' => 'M',
            ],
            [
                'name' => 'Gabbie Ondra',
                'email' => 'gondra1@privacy.gov.au',
                'mobile' => '150-268-4527',
                'address' => '74786 Lakeland Drive',
                'gender' => 'M',
            ],
            [
                'name' => 'Gnni Nowak',
                'email' => 'gnowak2@independent.co.uk',
                'mobile' => '374-724-6664',
                'address' => '915 Mockingbird Terrace',
                'gender' => 'F',
            ],
        ];

        foreach ($customers as $key => $value) {
            Customer::create($value);
        }
    }
}
