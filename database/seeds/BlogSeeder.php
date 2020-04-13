<?php

use Illuminate\Database\Seeder;
use App\Blog;
use App\Category;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker\Factory::create();
        $num_blogs = 10;

        if(count(Blog::all()) > 0){
            return;
        }

        for($i = 0; $i < $num_blogs; $i++){
            $blog = new Blog();
            $blog->title = $faker->text(10);
            $blog->description = $faker->text(300);
            $blog->url = Str::slug($faker->name()).'-'.time();
            $blog->avatar = $faker->imageUrl();
            $blog->category_id = Category::inRandomOrder()->first()->id;
            $blog->save();
        }
    }
}
