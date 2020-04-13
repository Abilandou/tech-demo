<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if(count(Contact::all()) > 0){
            return;
        }
        
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 10; $i++){
            $cnt = new Contact();
            $cnt->name = $faker->name();
            $cnt->email = $faker->email;
            $cnt->phone = $faker->phoneNumber;
            $cnt->subject = $faker->text(30);
            $cnt->message = $faker->text(250);
            $cnt->save();
        }
    }
}
