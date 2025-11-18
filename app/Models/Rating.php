<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'home_for_rent_id',
        'rating',
        'comment'
    ];

    protected $with = [
        'user'
    ];

    /**
     * Get the user that owns the rating.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the home that was rated.
     */
    public function homeForRent(): BelongsTo
    {
        return $this->belongsTo(HomeForRent::class);
    }
}
