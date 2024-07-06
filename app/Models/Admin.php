<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'tel',
        'adress',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get all of the contables for the Admin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contables(): HasMany
    {
        return $this->hasMany(Contable::class);
    }
}
