<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // check if table Admins is empty
        if(DB::table('admins')->get()->count() == 0){

            DB::table('admins')->insert([

                [
                    'name'      => 'Sana ullah',
                    'phone'     => '01831554683',
                    'email'     =>  'mneshat7@gmail.com',
                    'password'  => Hash::make('adminadmin'),
                    'category'  => '1',
                    'coupon'    => '1',
                    'product'   => '1',
                    'blog'      => '1',
                    'order'     => '1',
                   ' report'    => '1',
                    'user_role'    => '1',
                    'return_order'  => '1',
                    'contact_message'  => '1',
                    'product_comment'  => '1',
                    'product_stock'  => '1',
                    'setting'  => '1',
                    'other'  => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name'  => 'Sana ullah Tanvi',
                    'phone' => '01831554684',
                    'email' =>  'mneshat8@gmail.com',
                    'password' => Hash::make('tanvi380949'),
                    'category'  => '1',
                    'coupon'    => '1',
                    'product'   => '1',
                    'blog'      => '1',
                    'order'     => '1',
                   ' report'    => '1',
                    'user_role'    => '1',
                    'return_order'  => '1',
                    'contact_message'  => '1',
                    'product_comment'  => '1',
                    'product_stock'  => '1',
                    'setting'  => '1',
                    'other'  => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'name'  => 'Sana ullah Hridoy',
                    'phone' => '01831554685',
                    'email' =>  'mneshat9@gmail.com',
                    'password' => Hash::make('tanvi183'),
                    'category'  => '1',
                    'coupon'    => '1',
                    'product'   => '1',
                    'blog'      => '1',
                    'order'     => '1',
                   ' report'    => '1',
                    'user_role'    => '1',
                    'return_order'  => '1',
                    'contact_message'  => '1',
                    'product_comment'  => '1',
                    'product_stock'  => '1',
                    'setting'  => '1',
                    'other'  => '1',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]

            ]);

        } else { 
            echo "\e[31mTable is not empty, therefore NOT "; 
        }
    }
}