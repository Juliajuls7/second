<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ApiCategoryController extends Controller
{
    public function getAll()
    {
      return Category::all();
    }

    public function getSubAll(Category $category)
    {
      return $category->subcategories;
    }
}
