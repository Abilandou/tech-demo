<?php

use Illuminate\Database\Seeder;
use App\Category;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Category::all()) > 0){
            return;
        }

        $faker = Faker\Factory::create();

        for($i = 0; $i < 5; $i++){
            $cat = new Category();
            $cat->name = $faker->firstName();
            $cat->description = $faker->text(100);
            $cat->save();
        }
    }
}
