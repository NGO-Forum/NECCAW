<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeccawConfirmation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'organization',
        'interest',
        'experience',
        'commitments',
        'photo',
        'bio',
        'comments'
    ];

    protected $casts = [
        'commitments' => 'array'
    ];
}
