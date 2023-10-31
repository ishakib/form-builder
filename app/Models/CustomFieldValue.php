<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
    use HasFactory;

    protected $fillable = [
        'value', 'contextable_type', 'contextable_id', 'custom_field_id', 'updated_by',
    ];

    public function  contextable()
    {
        return $this->morphTo();
    }

    public function  customField()
    {
        return $this->belongsTo(CustomField::class);
    }
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

}
