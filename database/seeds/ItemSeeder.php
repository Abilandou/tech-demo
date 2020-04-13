<?php

use Illuminate\Database\Seeder;
use App\Item;
use App\ItemCategory;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Item::all()) > 0){
            return;
        }
        $faker = Faker\Factory::create();

        for($i = 0; $i < 100; $i++){
            $item = new Item();
            $item->name = $faker->text(10);
            $item->description = $faker->text(200);
            $item->url = Str::slug($faker->name());
            $item->avatar = $faker->imageUrl();
            $item->item_category_id = ItemCategory::inRandomOrder()->first()->id;
            $item->save();
        }
    }
}
