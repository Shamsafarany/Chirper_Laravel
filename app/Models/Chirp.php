<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chirp extends Model
{
    protected $fillable = [
        'message',
    ];

    //define foreign keys
    //call user on chirps-> grab user info associated to this chirp
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
