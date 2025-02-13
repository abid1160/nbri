<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('application_id');  // Add application_id column
            $table->foreign('application_id')->references('application_id')->on('applications');
            $table->string('guest_name');
            $table->string('organization');
            $table->integer('age');
            $table->string('gender');
            $table->string('contact');
            $table->string('category');
            $table->string('photo_id_proof');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};
