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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('application_name');
            $table->string('application_id')->unique();
            $table->string('organization_type'); // CSIR/Non-CSIR
            $table->foreignId('organization_id')->nullable()->constrained('organizations');
            $table->string('manual_organization')->nullable();
            $table->string('designation');
            $table->string('contact_no');
            $table->string('email');
            $table->string('image_path');
            $table->string('purpose');
            $table->date('date_of_arrival');
            $table->time('arrival_time');
            $table->date('date_of_departure');
            $table->time('departure_time');
            $table->integer('room');
            $table->string('payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
