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
       Schema::create("paniers",function(Blueprint $table){
        $table->id();
        $table->foreignId('produit_id')->constrained()->cascadeOnDelete();
        $table->foreignId('fournisseur_id')->constrained()->cascadeOnDelete();
        $table->foreignId('cabinet_id')->constrained()->cascadeOnDelete();
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
