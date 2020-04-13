<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Testimonial::all()) > 0){
            return;
        }

        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            $test = new Testimonial();
            $test->name = $faker->name();
            $test->profession = $faker->text(20);
            $test->testimony = $faker->text(100);
            $test->avatar = $faker->imageUrl();
            $test->save();
        }
    }
}
