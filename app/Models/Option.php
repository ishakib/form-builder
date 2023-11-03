<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['label', 'value', 'checked'];

    public function content(): BelongsTo
    {
        return $this->belongsTo(Content::class);
    }
}
