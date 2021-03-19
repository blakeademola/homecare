<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
       DB::table('products')->truncate();
        factory(App\Product::class, 20)->create()->each(function ($u) {
            $u->save();
        });


    }


}
