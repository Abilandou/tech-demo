<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(SubServiceSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(ItemCategorySeeder::class);//item category here 
        $this->call(ItemSeeder::class);//item here
        $this->call(EnquirySeeder::class);
        $this->call(MemberSeeder::class);
        $this->call(TestimonySeeder::class);
    }
}
