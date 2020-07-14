<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Meal;
use \App\FoodIngredient;
use Carbon\Carbon;

class MealController extends Controller
{
    public function create()
    {
        $todaysEnergy = 0;
        $yesterdaysEnergy = 0;
        $today = Carbon::now()->format("Y-m-d");
        $todaysMeal = Meal::where('ate_at', "{$today}")->get();
        foreach ($todaysMeal as $meal) {
            $calculationQuantity = $meal->quantity/100;
            $todaysEnergy += ($meal->food_ingredient->energy_kcal * $calculationQuantity);
        }
        dd($todaysEnergy);

        $yesterday = Carbon::now()->subDay()->format("Y-m-d");
        $yesterdaysMeal = Meal::where('ate_at', "{$yesterday}")->get();
        foreach ($yesterdaysMeal as $meal) {
            $yesterdaysEnergy += $meal->food_ingredient->energy_kcal;
        }
        

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
