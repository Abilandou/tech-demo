<?php

use Illuminate\Database\Seeder;
use App\User;

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
        if (User::count() > 0) {
            return;
        }

        $admins = [
            [
                'name' => 'admin',
                'email' => 'admin@techrepublic.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                'is_supper_admin' => true,
            ],
            [
                'name' => 'admin2',
                'email' => 'admin2@techrepublic.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password')
            ],
        ];

        foreach($admins as $admin)
        {
            User::create($admin);
        }
    }
}
