<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SfiaAtributes extends Model
{
    protected $table = 'Atributes';

    protected $fillable = [
        'Id', 'Level_1', 'Level_2', 'Level_3', 'Level_4', 'Level_5', 'Level_6', 'Level_7',
        'Code', 'URL', 'Atribute_name', 'Type', 'Overall_Description', 'Guidance_Notes',
        'Level_1_description', 'Level_2_description', 'Level_3_description', 'Level_4_description',
        'Level_5_description', 'Level_6_description', 'Level_7_description',
    ];
}
