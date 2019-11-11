<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

class Area extends Model
{
    use NodeTrait;

    protected $fillable = [
    	'name',
    	'slug',
    ];

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public static function boot()
    {
    	parent::boot();

    	static::creating(function ($area) {
    		$prefix = $area->parent ? $area->parent->name . ' ' : '';
    		$area->slug = Str::slug($prefix . $area->name);
    	});
    }
}
