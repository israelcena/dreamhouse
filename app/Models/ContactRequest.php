<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'home_for_rent_id',
        'name',
        'email',
        'phone',
        'message',
        'status'
    ];

    /**
     * Get the user that made the contact request.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the home for the contact request.
     */
    public function homeForRent(): BelongsTo
    {
        return $this->belongsTo(HomeForRent::class);
    }
}
