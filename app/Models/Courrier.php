<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courrier extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'reference',
        'objet',
        'date_courrier',
        'type',         // 'entrant' ou 'sortant'
        'expediteur',
        'destinataire',
        'service_id',
        'user_id',
        'observations',
    ];

    /**
     * Obtient le service associé au courrier.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Obtient l'utilisateur (créateur/assigné) du courrier.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Obtient les pièces jointes associées au courrier.
     */
    public function piecesJointes()
    {
        return $this->hasMany(PieceJointe::class);
    }
}
