<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    public static function getProjectCategories()
    {
        return self::select('id', 'name')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
