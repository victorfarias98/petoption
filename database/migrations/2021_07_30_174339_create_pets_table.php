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
            $table->uuid('id')->primary();
            $table->string('nickname');
            $table->string('thumb')->default('default.png');
            $table->text('description')->nullable();
            $table->uuid('breed_id')->nullable();
            $table->uuid('gallery_id')->nullable();
            $table->uuid('address_id')->nullable();
            $table->uuid('category_id')->nullable();
            $table->uuid('org_id')->nullable();
            $table->uuid('adopter_id')->nullable();
            $table->uuid('founder_id')->nullable();
            $table->uuid('user_id')->nullable();
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