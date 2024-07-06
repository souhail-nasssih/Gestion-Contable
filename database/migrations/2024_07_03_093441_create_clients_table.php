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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('adresse');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('pays');
            $table->string('nom_contact');
            $table->string('fonction');
            $table->string('tel');
            $table->string('site_web');
            $table->string('secteur');
            $table->string('nom_directeur');
            $table->string('email');
            $table->string('copy_fiscale');
            $table->string('copy_bancaire');
            $table->foreignId('contable_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
