<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProfileColumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile', 200)->default('よろしくお願いします。');
            $table->text('image')->default("https://user-profileicon.s3.ap-northeast-1.amazonaws.com/users_image/6dbei4c2jqlAKTEFbokc1tqPOq4C9Mdq2F7ntcHz.png");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
