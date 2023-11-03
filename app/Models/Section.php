<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'editingTitle'];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
}
}
