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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('age');
            $table->string('l_m_p');
            $table->string('medical_aid');
            $table->string('medical_aid_no');
            $table->string('examination');
            $table->string('examination_requested');
            $table->integer('doctor_id');
            $table->integer('radiographer_id')->nullable();  ;
            $table->string('patient_status');
            $table->string('image')->nullable();            
            $table->string('history');
            $table->string('appointment_rad')->nullable();
            $table->string('appointment_doctor')->nullable();
            $table->string('priority')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
