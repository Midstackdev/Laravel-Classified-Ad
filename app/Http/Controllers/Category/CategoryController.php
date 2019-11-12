<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\{Area, Category};
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Area $area)
    {
    	// eager load listing
    	$categories = Category::get()->toTree();
    	
    	return view('categories.index', compact('categories'));   
    }
}
