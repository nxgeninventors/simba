<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function clientcontacts()
    {
        return $this->hasMany(Clientcontact::class);
    }

    public static function getSupplier()
    {
        return self::where('is_supplier', true)
                    ->select('id','name')
                    ->orderBy('name', 'asc')
                    ->get();
    }
    
    public static function getClients()
    {
        return self::select('id', 'name')
                    ->orderBy('name', 'asc')
                    ->get();
    }
}
