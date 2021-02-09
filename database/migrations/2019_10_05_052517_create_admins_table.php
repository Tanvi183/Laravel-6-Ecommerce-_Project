<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64);
            $table->string('phone', 30)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 80);
            $table->rememberToken();
            $table->string('profile')->nullable();
            $table->tinyInteger('category', 4)->nullable();
            $table->tinyInteger('coupon', 4)->nullable();
            $table->tinyInteger('product', 4)->nullable();
            $table->tinyInteger('blog', 4)->nullable();
            $table->tinyInteger('order', 4)->nullable();
            $table->tinyInteger('report', 4)->nullable();
            $table->tinyInteger('user_role', 4)->nullable();
            $table->tinyInteger('return_order', 4)->nullable();
            $table->tinyInteger('contact_message', 4)->nullable();
            $table->tinyInteger('product_comment', 4)->nullable();
            $table->tinyInteger('product_stock', 4)->nullable();
            $table->tinyInteger('setting', 4)->nullable();
            $table->tinyInteger('other', 4)->nullable();
            $table->tinyInteger('user_type', 4)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
