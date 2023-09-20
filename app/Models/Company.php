<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'logo'
    ];

    public function comment(): HasMany {
        return $this->hasMany(Comment::class);
    }
}
