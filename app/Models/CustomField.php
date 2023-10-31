<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class CustomField extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'context', 'meta', 'in_list', 'is_for_admin', 'custom_field_type_id', 'created_by',
    ];
    protected $casts = [
        'in_list'=>'int',
        'custom_field_type_id' => 'int',
    ];
    public function createdRules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'custom_field_type_id' => 'required|integer|not_in:0',
            'meta' => [Rule::requiredIf(function () {
                return in_array(request()->get('type'), ['radio', 'select']);
            })],
            'context' => 'required'
        ];
    }

    public function getDescriptionForEvent(string $eventName) : string
    {
        $class_alias_array = explode('\\', get_called_class());
        $class_name = Str::snake(end($class_alias_array));

        return trans('default.log_description_message', [
            'model' => trans('default.'.$class_name),
            'event' => trans('default.'.$eventName)
        ]);
    }

    public static function boot()
    {
        parent::boot();
        if (!app()->runningInConsole()){
            static::creating(function($model){
                return $model->fill([
                    'created_by' => $model->created_by ?: auth()->id()
                ]);
            });
        }
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function customFieldValues()
    {
        return $this->hasMany(CustomFieldValue::class);
    }

    public function customFieldType()
    {
        return $this->belongsTo(CustomFieldType::class);
    }
}
