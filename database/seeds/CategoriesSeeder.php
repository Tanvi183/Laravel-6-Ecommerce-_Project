<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table categories is empty
        if(DB::table('categories')->get()->count() == 0){

            DB::table('categories')->insert([

                [
                    'category_name'  => "Men's Fashion",
                    'category_slug' => "Men's Fashion",
                ],
                [
                    'category_name'  => "Women's Fashion",
                    'category_slug' => "Women's Fashion",
                ],
                [
                    'category_name'  => "Child's",
                    'category_slug' => "Child's",
                ],
                [
                    'category_name'  => 'Watch',
                    'category_slug' => 'Watch',
                ],
                [
                    'category_name'  => 'Furniture',
                    'category_slug' => 'Furniture',
                ],
                [
                    'category_name'  => 'Electronics',
                    'category_slug' => 'Electronics',
                ],
                [
                    'category_name'  => "Health's",
                    'category_slug' => "Health's",
                ],
                [
                    'category_name'  => "Sport's And Outdoor",
                    'category_slug' => "Sport's And Outdoor",
                ]

            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT "; 
        }
    
    }
}
