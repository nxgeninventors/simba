<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeetingNote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'meeting_title',
        'meeting_notes',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['meeting_title'] ?? false,
            fn ($query, $inv_code) =>
            $query->where('meeting_title', 'like', '%'.$inv_code.'%')
        );

        $query->when(
            $filters['meeting_notes'] ?? false,
            fn ($query, $reason) =>
            $query->where('meeting_notes', 'like', '%'.$reason.'%')
        );

        //$query->where('active', 1);
    }
}
