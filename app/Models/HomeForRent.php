<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeForRent extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'address',
        'condition',
        'value',
        'area',
        'bed',
        'bath',
        'parking',
        'cep',
        'state',
        'description',
        'user_id'
    ];

    protected $with = [
        'user'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
