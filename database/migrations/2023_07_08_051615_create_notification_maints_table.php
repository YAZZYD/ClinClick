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
        Schema::create('notification_maints', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenancier_id')->constrained()->cascadeOnDelete();
            $table->string('sujet');
            $table->text('content');
            $table->integer('panne_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_maints');
    }
};
