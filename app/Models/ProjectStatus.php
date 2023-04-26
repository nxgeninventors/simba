<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    use HasFactory;

    public static function getProjectStatuses()
    {
        return self::select('id', 'name')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
