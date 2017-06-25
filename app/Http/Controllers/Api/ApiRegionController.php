<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;

class ApiRegionController extends Controller
{
    public function getAll()
    {
      return Region::all();
    }

    public function getCityAll(Region $region)
    {
      return $region->cities;
    }
}
