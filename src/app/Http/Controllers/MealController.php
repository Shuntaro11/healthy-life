<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MealController extends Controller
{
    public function create()
    {
        $today = date("Y-m-d");
        return view('meal.create', compact('today'));
    }

    public function store(Request $request)
    {
        return view('meal.create');
    }
}
