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
        Schema::create('notification_gerants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gerant_id')->constrained()->cascadeOnDelete();
            $table->integer('maintenancier_id')->nullable();
            $table->integer('offre_id')->nullable();
            $table->string('sujet');
            $table->text('content');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification_gerants');
    }
};
