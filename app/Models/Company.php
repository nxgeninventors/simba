<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    public static function getCompanies()
    {
        return self::select('id', 'company_name')
                    ->orderBy('company_name', 'asc')
                    ->get();
    }
}
