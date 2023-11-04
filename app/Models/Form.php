<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Form extends Model
{
    use HasFactory,HasSlug;
    protected $fillable = ['name'];

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->usingSeparator('-') // Set the separator for words (e.g., hyphen)
            ->allowDuplicateSlugs();
    }

}
