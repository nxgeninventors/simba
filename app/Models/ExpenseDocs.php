<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseDocs extends Model
{
    use HasFactory;

    public function expense()
    {
        return $this->belongsTo(Expense::class, 'expense_id');
    }
}
