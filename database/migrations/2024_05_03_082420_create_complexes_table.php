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
        Schema::create('complexes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->integer('count_flats');
            $table->integer('count_types');
            $table->float('min_price');
            $table->string('developer');
            $table->timestamps();
        });

        DB::table('complexes')->insert([
            ['name' => 'ЖК Аметист',
                'address'=>'Чернівці, вул. Науки',
                'count_flats'=>15,
                'count_types'=>4,
                'min_price'=>1000,
                'developer'=>'Родоліт-груп',
                'created_at' => now(),
                'updated_at' =>now()],

            ['name' => 'ЖК Сучасне Житло',
                'address'=>'Сторожинець, вул. Ольги Кобилянської',
                'count_flats'=>2,
                'count_types'=>1,
                'min_price'=>477,
                'developer'=>'Сity of Dreams development',
                'created_at' => now(),
                'updated_at' =>now()],

            ['name' => 'ЖК Престижний',
                'address'=>'Чернівці, вул. Героїв Майдану',
                'count_flats'=>1,
                'count_types'=>1,
                'min_price'=>1100,
                'developer'=>"Сузір'я",
                'created_at' => now(),
                'updated_at' =>now()],

            ['name' => 'ЖК Comfort Hall',
                'address'=>'Чернівці, вул. Руська',
                'count_flats'=>20,
                'count_types'=>3,
                'min_price'=>730,
                'developer'=>'Будторгінвест',
                'created_at' => now(),
                'updated_at' =>now()],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complexes');
    }
};
