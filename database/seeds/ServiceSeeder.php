<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Service::count() > 0) {
            return;
        }

        $services = [
            [
                'name' => 'networking',
                'description' => 'THis is for networking',
                'url' => 'networking',
            ],
            [
                'name' => 'computer Maintenance',
                'description' => 'This is for computer maintenance',
                'url' => 'computer-maintenance',
            ],
            [
                'name' => 'computer Maintenance',
                'description' => 'This is for computer maintenance',
                'url' => 'computer-maintenance',
            ],
        ];

        foreach($services as $service)
        {
            Service::create($service);
        }
    }
}
