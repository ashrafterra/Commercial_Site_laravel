<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class items extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('category');
            $table->unsignedinteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('availability')->default('1');
            $table->unsignedinteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->text('description');
            $table->unsignedinteger('price');
            $table->string('fileName');
            $table->string('contact_email')->nullable();
            $table->string('contact_telephone')->nullable();
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
        Schema::dropIfExists('items');
    }
}
