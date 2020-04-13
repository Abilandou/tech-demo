<?php

use Illuminate\Database\Seeder;
use App\Member;
use Illuminate\Support\Str;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Member::all()) > 0){
            return;
        }

        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++){
            $mem = new Member();
            $mem->name = $faker->name();
            $mem->email = $faker->email;
            $mem->phone = $faker->phoneNumber;
            $mem->position = $faker->text(10);
            $mem->description = $faker->text(150);
            $mem->url = Str::slug($faker->name()).'-'.time();
            $mem->youtube = $faker->url;
            $mem->facebook = $faker->url;
            $mem->twitter = $faker->url;
            $mem->avatar = $faker->imageUrl();
            $mem->save();
        }
    }
}
