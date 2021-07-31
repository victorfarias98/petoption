<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nickname');
            $table->string('thumb')->default('default.png');
            $table->text('description')->nullable();
            $table->foreignId('breed_id')->nullable();
            $table->foreignId('gallery_id')->nullable();
            $table->foreignId('address_id')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('org_id')->nullable();
            $table->foreignId('adopter_id')->nullable();
            $table->foreignId('founder_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->datetime('found_on')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('pets');
    }
}
