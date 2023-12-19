<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Candidature extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function candidats(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function formations(): BelongsTo
    {
        return $this->belongsTo(Formation::class);
    }
}
