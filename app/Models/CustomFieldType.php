<?php

namespace App\Models;

use App\Models\Core\Traits\Translate\TranslatedNameTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomFieldType extends Model
{
    use HasFactory;
    protected $appends = ['translated_name'];

    protected $fillable = [
        'name'
    ];

    public function getTranslatedNameAttribute()
    {
        return trans("default.{$this->attributes['name']}");
    }
}
