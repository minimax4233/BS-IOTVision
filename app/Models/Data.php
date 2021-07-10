<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = ['info'];

    public function user()
    {
        return $this->belongsToMany(Client::class);
    }
}
