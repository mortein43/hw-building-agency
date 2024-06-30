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
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('types')->insert([
            ['name' =>'Однокімнатна','created_at' => now(),'updated_at' =>now()],
            ['name' =>'Двокімнатна','created_at' => now(),'updated_at' =>now()],
            ['name' =>'Трьохкімнатна','created_at' => now(),'updated_at' =>now()],
            ['name' =>'Пентхаус','created_at' => now(),'updated_at' =>now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
