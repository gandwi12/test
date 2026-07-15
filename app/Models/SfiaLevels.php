<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SfiaLevels extends Model
{
    protected $table = 'Levels';

    protected $fillable = [
        'Levels',
        'Guiding_Phrase',
        'Essence_of_level',
        'URL'
    ];
}
