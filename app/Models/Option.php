<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;
    protected $fillable = ['label', 'value', 'checked'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
