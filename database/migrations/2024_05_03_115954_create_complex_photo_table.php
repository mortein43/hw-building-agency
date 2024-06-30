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
        Schema::create('complex_photo', function (Blueprint $table) {
            $table->string('photo');
            $table->unsignedBigInteger('complex_id');
        });

        Schema::table('complex_photo', function (Blueprint $table) {
            $table->foreign('complex_id')->references('id')->on('complexes')->onDelete('cascade');
        });

        DB::table('complex_photo')->insert([
            ['photo' =>'https://img.lunstatic.net/building-440x330/69930.jpg',
                'complex_id'=>1],
            ['photo' =>'https://img.lunstatic.net/building-600x300/68751.jpg',
                'complex_id'=>1],
            ['photo' =>'https://rodolit-grup.com.ua/wp-content/uploads/2023/09/93.jpeg',
                'complex_id'=>1],
            ['photo' =>'https://img.lunstatic.net/building-440x330/13615.jpg',
                'complex_id'=>2],
            ['photo' =>'https://img.lunstatic.net/building-440x330/13616.png',
                'complex_id'=>2],
            ['photo' =>'https://img.lunstatic.net/building-440x330/13615.jpg',
                'complex_id'=>2],
            ['photo' =>'https://img.lunstatic.net/building-440x330/26175.jpg',
                'complex_id'=>3],
            ['photo' =>'https://img.lunstatic.net/building-440x330/26173.jpg',
                'complex_id'=>3],
            ['photo' =>'https://cdn.riastatic.com/photosnewr/dom/newbuild_photo/photo__71178-620x460x80.jpg',
                'complex_id'=>3],
            ['photo' =>'https://img.lunstatic.net/building-440x330/39673.jpg',
                'complex_id'=>4],
            ['photo' =>'https://vn.com.ua/Media/images/complex/big/c64cbe02b4c78268f658500b65e9b1b0.jpg',
                'complex_id'=>4],
            ['photo' =>'https://comforthall.com.ua/img/stroika/15.jpg',
                'complex_id'=>4],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complex_photo');
    }
};
