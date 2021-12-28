<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Watched_time extends Model
{
    use HasFactory;
    
    protected $table = 'watched_time';
    
    protected $fillable = [
        'user_id',
        'channel_id',
        'minutes',
        'date',
    ];

    

}