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
        Schema::create('student', function (Blueprint $table) {
            $table->id('id_student');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('cpf', 14)->unique();
            $table->date('birth_date');
            $table->string('phone', 15);
            $table->string('email');
            $table->jsonb('address');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('appointment_status', function (Blueprint $table) {
            $table->id('id_appointment_status');
            $table->string('name');
        });

        Schema::create('appointment_type', function (Blueprint $table) {
            $table->id('id_appointment_type');
            $table->string('name');
        });

        Schema::create('appointment', function (Blueprint $table) {
            $table->id('id_appointment');
            $table->foreignId('id_student')->constrained('student', 'id_student');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->foreignId('id_appointment_status')->constrained('appointment_status', 'id_appointment_status');
            $table->foreignId('id_appointment_type')->constrained('appointment_type', 'id_appointment_type');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('evaluation', function (Blueprint $table) {
            $table->id('id_evaluation');
            $table->foreignId('id_student')->constrained('student', 'id_student');
            $table->dateTime('date');
            $table->jsonb('metrics');
            $table->text('description');
            $table->integer('score');
            $table->timestamps();
        });

        Schema::create('evaluation_media', function (Blueprint $table) {
            $table->id('id_evaluation_media');
            $table->foreignId('id_evaluation')->constrained('evaluation', 'id_evaluation');
            $table->string('path');
            $table->timestamps();
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->id('id_attendance');
            $table->foreignId('id_student')->constrained('student', 'id_student');
            $table->foreignId('id_appointment')->constrained('appointment', 'id_appointment');
            $table->string('hash_facial_recognition')->nullable();
            $table->dateTime('date');
            $table->boolean('present');
        });

        Schema::create('website', function (Blueprint $table) {
            $table->id('id_website');
            $table->string('name');
            $table->string('domain');
            $table->jsonb('config');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website');
        Schema::dropIfExists('attendance');
        Schema::dropIfExists('evaluation_media');
        Schema::dropIfExists('evaluation');
        Schema::dropIfExists('appointment');
        Schema::dropIfExists('appointment_type');
        Schema::dropIfExists('appointment_status');
        Schema::dropIfExists('student');
    }
};
