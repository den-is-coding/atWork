<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
//    use Filterable;
//    protected $guarded = false;

    protected $fillable = [
      'id',
      'content',
      'score',
      'member_id',
      'company_id',
    ];

    public function company(): BelongsTo {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function member(): BelongsTo {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
