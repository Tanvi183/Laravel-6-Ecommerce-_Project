<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Sub__categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table sub__categories is empty
        if(DB::table('sub__categories')->get()->count() == 0){

            DB::table('sub__categories')->insert([

                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Shirt & T-shirt',
                    'subcategory_slug' => 'Shirt & T-shirt',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Panjabi',
                    'subcategory_slug' => 'Panjabi',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Shoes',
                    'subcategory_slug' => 'Shoes',
                ],
                [
                    'category_id'      => 1,
                    'subcategory_name' => 'Jacket',
                    'subcategory_slug' => 'Jacket',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Saree',
                    'subcategory_slug' => 'Saree',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Three-Peace',
                    'subcategory_slug' => 'Three-Peace',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Kurtis',
                    'subcategory_slug' => 'Kurtis',
                ],
                [
                    'category_id'      => 2,
                    'subcategory_name' => 'Shoes',
                    'subcategory_slug' => 'Shoes',
                ],
                [
                    'category_id'      => 4,
                    'subcategory_name' => "Man's Watch",
                    'subcategory_slug' => "Man's Watch",
                ],
                [
                    'category_id'      => 4,
                    'subcategory_name' => 'Woman Watch',
                    'subcategory_slug' => 'Woman Watch',
                ],
                [
                    'category_id'      => 6,
                    'subcategory_name' => 'Phone',
                    'subcategory_slug' => 'Phone',
                ],
                [
                    'category_id'      => 6,
                    'subcategory_name' => 'Laptops',
                    'subcategory_slug' => 'Laptops',
                ],
                [
                    'category_id'      => 6,
                    'subcategory_name' => 'Desktop',
                    'subcategory_slug' => 'Desktop',
                ],
                [
                    'category_id'      => 6,
                    'subcategory_name' => 'Tv',
                    'subcategory_slug' => 'Tv',
                ],
                [
                    'category_id'      => 6,
                    'subcategory_name' => 'Refrigerator',
                    'subcategory_slug' => 'Refrigerator',
                ]

            ]);

        } else {
            echo "\e[31mTable is not empty, therefore NOT "; 
        }

    }
}
