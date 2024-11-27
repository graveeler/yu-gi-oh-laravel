<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardBanlist extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'card_id'
    ];

    protected $table = 'banlists_info';


}
