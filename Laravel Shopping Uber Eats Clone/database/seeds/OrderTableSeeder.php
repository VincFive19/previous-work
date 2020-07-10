<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        DB::table('orders')->insert([
            'dish_Id'=>'3',
            'user_Id'=> '1',
            'date'=>$dateNow,
        ]);

        DB::table('orders')->insert([
            'dish_Id'=>'4',
            'user_Id'=> '1',
            'date'=>$dateNow,
        ]);

        DB::table('orders')->insert([
            'dish_Id'=>'3',
            'user_Id'=> '1',
            'date'=>$dateNow,
        ]);
        
    }
}
