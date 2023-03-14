<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('location_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->foreignId('subcategory_id')->constrained()->cascadeOnDelete();
            $table->string('image_one');
            $table->string('image_two');
            $table->string('image_three')->nullable();
            $table->string('image_four')->nullable();
            $table->string('slug');
            $table->integer('contact_number');
            $table->integer('price');
            $table->string('item_name');
            $table->longText('description')->nullable();
            $table->string('others')->nullable();
            $table->string('condition');
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
        Schema::dropIfExists('postads');
    }
}
