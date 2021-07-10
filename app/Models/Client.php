<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'clientID',
        'clientName',
        'is_online'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
