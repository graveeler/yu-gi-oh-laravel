<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardPrice extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_id'
    ];

    protected $table = 'card_prices';

}
