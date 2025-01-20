<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Institution;
use Illuminate\Http\Request;

class ApiDataController extends Controller
{
    public function getCategoriesData()
    {
        $categories = Category::orderBy('name')->get();  
        return response()->json($categories);
    }

    public function getInstitutionsData()
    {
        $institutions = Institution::orderBy('name')->get();  
        return response()->json($institutions);
    }  

}
