<?php

use Illuminate\Database\Seeder;

class DishTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dishes')->insert([
            'name'=>'StrawBerry Jam',
            'price'=> '10',
            'user_id'=>'1',
            'image'=>'dish_images/3teMxhTSBQzijnk9pSvXfvSRtXyGtafv2kTs2m1V.jpeg'
        ]);
        DB::table('dishes')->insert([
            'name'=>'Enchilada',
            'price'=> '20',
            'user_id'=>'1',
            'image'=>'dish_images/3teMxhTSBQzijnk9pSvXfvSRtXyGtafv2kTs2m1V.jpeg'
        ]);
        DB::table('dishes')->insert([
            'name'=>'Quich',
            'price'=> '30',
            'user_id'=>'2',
            'image'=>'dish_images/3teMxhTSBQzijnk9pSvXfvSRtXyGtafv2kTs2m1V.jpeg'
        ]);
        DB::table('dishes')->insert([
            'name'=>'Basil',
            'price'=> '5',
            'user_id'=>'2',
            'image'=>'dish_images/3teMxhTSBQzijnk9pSvXfvSRtXyGtafv2kTs2m1V.jpeg'
        ]);
        DB::table('dishes')->insert([
            'name'=>'Chicken Teriaki',
            'price'=> '25',
            'user_id'=>'1',
            'image'=>'dish_images/3teMxhTSBQzijnk9pSvXfvSRtXyGtafv2kTs2m1V.jpeg'
        ]);
    }
}
