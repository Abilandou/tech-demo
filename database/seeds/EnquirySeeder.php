<?php

use Illuminate\Database\Seeder;
use App\Enquiry;
use App\Item;

class EnquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Enquiry::all()) > 0){
            return;
        }

        $faker = Faker\Factory::create();

        for($i = 0; $i < 30; $i++){
            $enq = new Enquiry();
            $enq->name = $faker->name();
            $enq->email = $faker->email;
            $enq->telephone = $faker->phoneNumber;
            $enq->item_id = Item::inRandomOrder()->first()->id;
            $enq->message = $faker->text(200);
            $enq->save();
            
        }
    }
}
