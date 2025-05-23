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
        Schema::create('courriers', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->string('objet');
            $table->date('date_courrier');
            $table->enum('type', ['entrant', 'sortant']);
            $table->string('expediteur')->nullable();
            $table->string('destinataire')->nullable();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->text('observations')->nullable();
            $table->timestamps();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courriers');
    }
    public function service() {
        return $this->belongsTo(Service::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function piecesJointes() {
        return $this->hasMany(PieceJointe::class);
    }
};
