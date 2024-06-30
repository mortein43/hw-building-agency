<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('complex_id');
            $table->unsignedBigInteger('type_id');
            $table->float('price');
            $table->float('area');
            $table->integer('count');
            $table->timestamps();
        });
        Schema::table('flats', function (Blueprint $table) {

            $table->foreign('complex_id')->references('id')->on('complexes')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });

        DB::table('flats')->insert([
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__558521-620x460x90.webp',
                'complex_id' =>1,
                'type_id'=>1,
                'price'=>49280,
                'area'=>44.8,
                'count'=>2,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__558520-620x460x90.webp',
                'complex_id' =>1,
                'type_id'=>1,
                'price'=>49313,
                'area'=>44.83,
                'count'=>4,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__558552-620x460x90.webp',
                'complex_id' =>1,
                'type_id'=>2,
                'price'=>68200,
                'area'=>62,
                'count'=>7,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__558555-620x460x90.webp',
                'complex_id' =>1,
                'type_id'=>3,
                'price'=>86830,
                'area'=>86.83,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__558553-620x460x90.webp',
                'complex_id' =>1,
                'type_id'=>3,
                'price'=>87620,
                'area'=>87.62,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__606410-620x460x90.webp',
                'complex_id' =>2,
                'type_id'=>1,
                'price'=>24984,
                'area'=>52.4,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__606413-620x460x90.webp',
                'complex_id' =>2,
                'type_id'=>1,
                'price'=>26223,
                'area'=>55,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__510570-620x460x90.webp',
                'complex_id' =>3,
                'type_id'=>2,
                'price'=>79970,
                'area'=>72.7,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__608037-620x460x90.webp',
                'complex_id' =>4,
                'type_id'=>2,
                'price'=>41850,
                'area'=>55.8,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__677649-620x460x90.webp',
                'complex_id' =>4,
                'type_id'=>2,
                'price'=>48375,
                'area'=>64.5,
                'count'=>8,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__677652-620x460x90.webp',
                'complex_id' =>4,
                'type_id'=>3,
                'price'=>71550,
                'area'=>95.4,
                'count'=>9,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__608026-620x460x90.webp',
                'complex_id' =>4,
                'type_id'=>4,
                'price'=>89717,
                'area'=>122.9,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
            [
                'photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__608027-620x460x90.webp',
                'complex_id' =>4,
                'type_id'=>4,
                'price'=>111444,
                'area'=>150.6,
                'count'=>1,
                'created_at' => now(),
                'updated_at' =>now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flats');
    }
};
