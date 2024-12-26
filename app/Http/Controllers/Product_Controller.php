<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product_Controller extends Controller
{
    function Create(Request $request)
    {
        return view('admin\product\create');
    }
}
