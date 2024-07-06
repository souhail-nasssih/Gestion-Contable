<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contable extends Model
{
    use HasFactory;

    protected $fillable = [
        'salaire',
        'admin_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the admin that owns the Contable
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * Get all of the clients for the Contable
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }

    
}
