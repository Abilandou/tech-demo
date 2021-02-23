<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Admin::count() > 0) {
            return;
        }

        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@techrepublic.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password')
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@techrepublic.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password')
            ],
        ];

        foreach($admins as $admin)
        {
            Admin::create($admin);
        }
    }
}