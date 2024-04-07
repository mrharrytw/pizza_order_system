<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('categories')->delete();

        DB::table('categories')->insert(
            array(
                0 =>
                    array(
                        'id' => 1,
                        'name' => 'Drinks',
                        'created_at' => '2024-04-06 18:18:00',
                        'updated_at' => '2024-04-06 18:18:00',
                    ),
                1 =>
                    array(
                        'id' => 2,
                        'name' => 'Beverages',
                        'created_at' => '2024-04-06 18:18:12',
                        'updated_at' => '2024-04-06 18:18:12',
                    ),
                2 =>
                    array(
                        'id' => 3,
                        'name' => 'Snacks',
                        'created_at' => '2024-04-06 18:18:30',
                        'updated_at' => '2024-04-06 18:18:30',
                    ),
                3 =>
                    array(
                        'id' => 4,
                        'name' => 'Grills',
                        'created_at' => '2024-04-06 18:18:40',
                        'updated_at' => '2024-04-06 18:18:40',
                    ),
                4 =>
                    array(
                        'id' => 5,
                        'name' => 'Pizza',
                        'created_at' => '2024-04-06 18:18:59',
                        'updated_at' => '2024-04-06 18:18:59',
                    ),
                5 =>
                    array(
                        'id' => 6,
                        'name' => 'Burger',
                        'created_at' => '2024-04-06 18:19:23',
                        'updated_at' => '2024-04-06 18:19:23',
                    ),
            )
        );


    }
}
