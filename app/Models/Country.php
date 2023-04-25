<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public static function getCountries()
    {
        return self::select('id', 'name')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
