<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
    	/*for($i=0; $i<5; $i++){
        	DB::table('albums')->insert([
        		'name' => title_case(str_random(15)),
        		'artist_id' => rand(1,5)
        	]);
        }

        for($i=0; $i<5; $i++){
            DB::table('artists')->insert([
                'name' => $faker->name,
                'bio' => $faker->address
            ]);
        }*/
        for($i=0; $i<10; $i++){
            DB::table('products')->insert([
                'name' => $faker->lastname,
                'make' => strtoupper(str_random(5)),
                'model' =>strtoupper(str_random(5))
            ]);
        }

        for($i=0; $i<10; $i++){
            DB::table('customers')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address
            ]);
        }

        for($i=0; $i<10; $i++){
            DB::table('issues')->insert([
                'subject' => $faker->realText(40),
                'detail' => $faker->realText(200),
                'customer_id' => rand(1,10),
                'product_id' => rand(1,5),
                'status' => rand(1,4),
                'user_id' => rand(1,2)
            ]);
        }

        DB::table('users')->insert([
            'name' => 'bob',
            'email' => 'bob@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 2
        ]);
    }
}
