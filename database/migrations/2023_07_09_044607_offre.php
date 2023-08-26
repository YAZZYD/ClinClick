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
        Schema::create('offres',function(Blueprint $table){
            $table->id();
            $table->foreignId('maintenancier_id')->constrained()->cascadeOnDelete();
            $table->foreignId('panne_id')->constrained()->cascadeOnDelete();
            $table->integer('prix');
            $table->timestamp('date')->nullable();
            $table->timestamp('updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
