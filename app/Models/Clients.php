<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    // protected $table= 'clients';

    // protected $guarded=[];

    protected $fillable = ['name', 'website','industry', 'description','country_id', 'email','mobile', 'street_address','city', 'state','zip'];
}