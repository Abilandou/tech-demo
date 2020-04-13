<?php

use Illuminate\Database\Seeder;
use App\Service;
use Illuminate\Support\Str;

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

        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            $service = new Service();
            $service->name = $faker->text(10);
            $service->description = $faker->text(300);
            $service->avatar = $faker->imageUrl();
            $service->url = Str::slug($faker->name());
            $service->save();
        }

       
    }
}
