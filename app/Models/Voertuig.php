<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voertuig extends Model
{
    use HasFactory;

    protected $table = 'voertuigen'; // explicitly set the table name

    protected $fillable = [
        'kenteken',
        'merk',
        'type',
        'bouwdatum',
        'prijs_ingekocht',
        'prijs_te_koop',
        'categorie_id',
        'foto_path'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
