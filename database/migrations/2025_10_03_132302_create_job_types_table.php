<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_types', function (Blueprint $table) {
         $table->id();
         $table->string('name'); // e.g. دوام كامل
         $table->string('slug')->unique(); // e.g. full_time
         $table->timestamps();
        });


        // \App\Models\JobType::insert([
        //     ['name' => 'دوام كامل', 'slug' => 'full_time'],
        //     ['name' => 'دوام جزئي', 'slug' => 'part_time'],
        //     ['name' => 'عن بعد', 'slug' => 'remote'],
        //     ['name' => 'تدريب', 'slug' => 'internship'],
        //     ['name' => 'مؤقت', 'slug' => 'temporary'],
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_types');
    }
};
