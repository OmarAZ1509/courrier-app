<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePieceJointesTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piece_jointes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('courrier_id')
                  ->constrained()
                  ->onDelete('cascade'); // Supprime la pièce jointe si le courrier est supprimé
            $table->string('filename');
            $table->string('filepath');
            $table->string('mime_type');
            $table->timestamps();
        });
    }

    /**
     * Annule la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('piece_jointes');
    }
}
