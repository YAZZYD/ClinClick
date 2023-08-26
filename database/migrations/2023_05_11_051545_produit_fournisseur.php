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
        Schema::create('produit_fournisseur',function(Blueprint $table){
            $table->foreignId('produit_id')->constrained()->cascadeOnDelete();
            $table->foreignId('fournisseur_id')->constrained()->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->double('prix');
            $table->integer('qte');
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
