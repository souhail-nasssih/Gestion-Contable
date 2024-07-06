<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ["nom_entreprise", "adresse", "ville", "code_postal", "pays", "nom_contact", "fonction", "tel", "site_web", "secteur", "nom_directeur", "email", "copy_fiscale", "copy_bancaire", "contable_id"];


    /**
     * Get the contable that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contable(): BelongsTo
    {
        return $this->belongsTo(Contable::class);
    }
    /**
     * Get all of the taches for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function taches(): HasMany
    {
        return $this->hasMany(Tache::class);
    }
}
