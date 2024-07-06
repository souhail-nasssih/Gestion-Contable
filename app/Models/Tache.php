<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tache extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'description',
        'Date_echeance',
        'statut',
        'client_id',

    ];
    /**
     * Get the client that owns the Tache
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

}
