<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PieceJointe extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'courrier_id',
        'filename',
        'filepath',
        'mime_type'
    ];

    /**
     * Obtient le courrier associé à la pièce jointe.
     */
    public function courrier()
    {
        return $this->belongsTo(Courrier::class);
    }
}
