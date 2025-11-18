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

    public function advancedSearch(array $filters)
    {
        return $this->where(function ($query) use ($filters) {
            if (!empty($filters['localization'])) {
                $query->where('address', 'LIKE', "%{$filters['localization']}%");
            }

            if (!empty($filters['type'])) {
                $query->where('type', $filters['type']);
            }

            if (!empty($filters['min-value'])) {
                $query->where('value', '>=', $filters['min-value']);
            }

            if (!empty($filters['max-value'])) {
                $query->where('value', '<=', $filters['max-value']);
            }

            if (!empty($filters['beds'])) {
                $query->where('bed', '>=', $filters['beds']);
            }

            if (!empty($filters['baths'])) {
                $query->where('bath', '>=', $filters['baths']);
            }

            if (!empty($filters['parking'])) {
                $query->where('parking', '>=', $filters['parking']);
            }

            // Apenas casas ativas
            $query->where('active', true);
        });
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }

    public function totalRatings()
    {
        return $this->ratings()->count();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function contactRequests()
    {
        return $this->hasMany(ContactRequest::class);
    }

    public function totalFavorites()
    {
        return $this->favorites()->count();
    }

}
