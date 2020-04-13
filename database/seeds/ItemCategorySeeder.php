<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;

class ItemCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(ItemCategory::all()) > 0){
            return;
        }

        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++ ){
            $iCat = new ItemCategory();
            $iCat->name = $faker->text(10);
            $iCat->description = $faker->text(100);
            $iCat->save();
        }
    }
}
