<?php

use App\Enums\PaiementState;
use App\Models\Paiement;
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
        Schema::disableForeignKeyConstraints();

        Schema::create('paiements', function (Blueprint $table) {
            $table->id();
            $table->string('num_transaction');
            $table->decimal('montant');
            $table->timestamp('date_paiement');
            $table->string('preuve_paiement');
            $table->string('statut')->default(PaiementState::NO->value);
            $table->foreignId('dossier_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
