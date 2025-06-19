<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinutesOfMeeting extends Model
{
    use HasFactory;

    protected $fillable = [
        'action_items',
        'discussion_points',
        'decisions',
        'file_url',
    ];
}
