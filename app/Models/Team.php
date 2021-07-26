<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price'
    ];

    public function setNameAttribute(string $value): void
    {
        $this->attributes['name'] = strtolower($value);
    }

    public function getNameAttribute(): string
    {
        return ucwords($this->attributes['name']);
    }

    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }
}
