<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('plan', function (Blueprint $table) {
            $table->id('id_plan');
            $table->string('name');
            $table->text('description');
            $table->double('value');
            $table->json('config');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::create('tenant', function (Blueprint $table) {
            $table->id('id_tenant');
            $table->string('name', 255);
            $table->foreignId('id_plan')->constrained('plan', 'id_plan');
            $table->string('domain');
            $table->json('config');
            $table->boolean('active');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('id_tentant')->nullable()->constrained('tenant', 'id_tenant');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
        Schema::dropIfExists('tenant');
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_tentant']);
        });
    }
};
