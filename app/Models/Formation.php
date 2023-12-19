<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Formation extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function formateurs(): BelongsTo
    {
        return $this->belongsTo(User::class, 'formateur_id');
    }

    public function candidatures()
    {
        return $this->hasMany(Candidature::class);
    }
}
