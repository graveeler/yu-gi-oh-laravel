<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type'
    ];

    function cardFormats() : HasMany
    {
        return $this->hasMany(CardFormat::class);
    }

    function cardImageSmall()
    {
        return $this->hasOne(CardImage::class);
    }

    function banlists()
    {
        return $this->hasMany(CardBanlist::class);
    }
}
