<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
	use NodeTrait;
	
    protected $fillable = [
    	'name',
    	'slug',
    	'price'
    ];

    public static function boot()
    {
    	parent::boot();

    	static::creating(function($category) {
    		$prefix = $category->parent ? $category->parent->name . ' ' : '';
    		$category->slug = Str::slug($prefix . $category->name);
    	});
    } 

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function scopeWithListingsInArea($query, Area $area)
    {
        return $query->with(['listings' => function ($q) use ($area){
                    $q->isLive()->inArea($area);
                }]);
    }

    public function listings()
    {
        return $this->hasmany(Listing::class);
    }
}
