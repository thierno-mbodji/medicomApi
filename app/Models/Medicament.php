<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicament extends Model
{
    use HasFactory;
    protected $table = 'medicament';
    protected $fillable = [
        'medicament_nom',
        'medicament_categorie',
        'medicament_reference',
        'medicament_prix',
    ];
}
