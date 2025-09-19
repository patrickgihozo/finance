<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'amount',
        'date',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
