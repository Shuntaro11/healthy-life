<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Meal;
use \App\FoodIngredient;

class MealController extends Controller
{
    public function create()
    {
        $today = date("Y-m-d");
        return view('meal.create', compact('today'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'ate_at' => ['required'],
            'quantity' => ['required', 'max:6'],
            'food_name' => ['required'],
        ]);

        $food_ingredient = FoodIngredient::where('food_name', "{$request->food_name}")->first();

        $meal = new Meal;
        $meal->ate_at = $request->ate_at;
        $meal->quantity = $request->quantity;
        $meal->user_id = Auth::user()->id;
        $meal->food_ingredient_id = $food_ingredient->id;
        
        $meal->save();

        $today = date("Y-m-d");
        return view('meal.create', compact('today'));
    }
}
