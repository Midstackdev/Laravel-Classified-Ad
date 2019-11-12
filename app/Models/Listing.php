<?php

namespace App\Models;

use App\Traits\Eloquent\OrderableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use SoftDeletes, OrderableTrait;

    public function scopeIsLive($query)
    {
    	return $query->where('live', 1);
    }

    public function scopeIsNotLive($query)
    {
    	return $query->where('live', 0);
    }

    public function scopeFromcategory($query, Category $category)
    {
    	return $query->where('category_id', $category->id);
    }

    public function scopeInArea($query, Area $area)
    {
    	return $query->whereIn('area_id', array_merge(
    		[$area->id],
    		$area->descendants->pluck('id')->toArray()
    	));
    }
    public function live()
    {
    	return $this->live;
    }

    public function cost()
    {
    	return $this->category->price;
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function area()
    {
    	return $this->belongsTo(Area::class);
    }
}
