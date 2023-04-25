<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;


    public static function getExpenseCategories()
    {
        return self::select('id', 'name', 'description')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
