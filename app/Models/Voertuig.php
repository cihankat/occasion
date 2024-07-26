<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    use HasFactory;

    protected $table = 'voertuigen'; // explicitly specify the table name

    protected $fillable = [
        'kenteken',
        'merk',
        'type',
        'bouwdatum',
        'prijs_ingekocht',
        'prijs_te_koop',
        'categorie',
        'foto_path',
    ];
}
