<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
            'name' => 'Junaid Ali',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
            ],[
                'name' => 'Haseeb',
                'email' => 'inventory@inventory.com',
                'password' => bcrypt('password'),
                'role_id' => 2,
            ],[
                'name' => 'Hassnain',
                'email' => 'staff@staff.com',
                'password' => bcrypt('password'),
                'role_id' => 3,
            ],[
                'name' => 'Muzammil',
                'email' => 'staff2@staff.com',
                'password' => bcrypt('password'),
                'role_id' => 3,
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
