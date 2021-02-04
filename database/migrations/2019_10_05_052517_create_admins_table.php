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
            $table->string('profile', 155)->nullable();
            $table->string('category', 10)->nullable();
            $table->string('coupon', 10)->nullable();
            $table->string('product', 10)->nullable();
            $table->string('blog', 10)->nullable();
            $table->string('order', 10)->nullable();
            $table->string('report', 10)->nullable();
            $table->string('user_role', 10)->nullable();
            $table->string('return_order', 10)->nullable();
            $table->string('contact_message', 10)->nullable();
            $table->string('product_comment', 10)->nullable();
            $table->string('product_stock', 10)->nullable();
            $table->string('setting', 10)->nullable();
            $table->string('other', 10)->nullable();
            $table->tinyInteger('user_type', 10)->default(1);
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
