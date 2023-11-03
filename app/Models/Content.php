<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'label'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function inputField()
    {
        return $this->hasOne(InputField::class);
    }
}
