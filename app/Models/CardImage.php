<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardImage extends Model
{
    protected $fillable = [
        'card_id'
    ];

    protected $table = 'card_images';

}
