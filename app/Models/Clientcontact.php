<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientcontact extends Model
{
    use HasFactory;

    protected $table = 'client_contacts';

    protected $fillable = ['first_name', 'last_name', 'title', 'email', 'mobile', 'gender', 'client_id'];

}
