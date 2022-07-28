<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomeForRent extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'photo',
        'address',
        'condition',
        'type',
        'value',
        'area',
        'bed',
        'bath',
        'parking',
        'cep',
        'active',
        'user_id'
    ];

    protected $with = [
        'users'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function search(string $search = null)
    {
        return $this->where(
          function ($query) use ($search) {
              if ($search){
                  $query->where('type', $search);
                  $query->orWhere('address', 'LIKE', "%{$search}%");
              }
          }
        );
    }

}
