<?php

use Illuminate\Database\Seeder;
use App\SubService;
use App\Service;
use Illuminate\Support\Str;

class SubServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(SubService::all()) > 0){
            return;
        }

        $faker = Faker\Factory::create();
        for($i = 0; $i < 20; $i++){
            $subService = new SubService();
            $subService->name = $faker->text(10);
            $subService->description = $faker->text(100);
            $subService->avatar = $faker->imageUrl();
            $subService->url = Str::slug($faker->name());
            $subService->service_id = Service::inRandomOrder()->first()->id;
            $subService->save();
        }
    }
}
