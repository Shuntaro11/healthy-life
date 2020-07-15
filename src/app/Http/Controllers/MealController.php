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
        $todaysProtein = 0;
        $todaysFat = 0;
        $todaysCarbon = 0;
        $todaysVitaminb1 = 0;
        $todaysVitaminc = 0;
        $todaysSalt = 0;
        $todaysDietaryFiber = 0;
        $todaysCalcium = 0;

        $today = Carbon::now()->format("Y-m-d");
        $todaysMeal = Meal::where('ate_at', "{$today}")->get();

        foreach ($todaysMeal as $meal) {
            $calculationQuantity = $meal->quantity/100;
            $todaysEnergy += ($meal->food_ingredient->energy_kcal * $calculationQuantity);
            $todaysProtein += ($meal->food_ingredient->protein * $calculationQuantity);
            $todaysFat += ($meal->food_ingredient->fat * $calculationQuantity);
            $todaysCarbon += ($meal->food_ingredient->carbon * $calculationQuantity);
            $todaysVitaminb1 += ($meal->food_ingredient->vitamin_b1 * $calculationQuantity);
            $todaysVitaminc += ($meal->food_ingredient->vitamin_c * $calculationQuantity);
            $todaysSalt += ($meal->food_ingredient->salt * $calculationQuantity);
            $todaysDietaryFiber += ($meal->food_ingredient->dietary_fiber * $calculationQuantity);
            $todaysCalcium += ($meal->food_ingredient->calcium * $calculationQuantity);
        }

        $yesterdaysEnergy = 0;
        $yesterdaysProtein = 0;
        $yesterdaysFat = 0;
        $yesterdaysCarbon = 0;
        $yesterdaysVitaminb1 = 0;
        $yesterdaysVitaminc = 0;
        $yesterdaysSalt = 0;
        $yesterdaysDietaryFiber = 0;
        $yesterdaysCalcium = 0;

        $yesterday = Carbon::now()->subDay()->format("Y-m-d");
        $yesterdaysMeal = Meal::where('ate_at', "{$yesterday}")->get();

        foreach ($yesterdaysMeal as $meal) {
            $calculationQuantity = $meal->quantity/100;
            $yesterdaysEnergy += $meal->food_ingredient->energy_kcal;
            $yesterdaysProtein += ($meal->food_ingredient->protein * $calculationQuantity);
            $yesterdaysFat += ($meal->food_ingredient->fat * $calculationQuantity);
            $yesterdaysCarbon += ($meal->food_ingredient->carbon * $calculationQuantity);
            $yesterdaysVitaminb1 += ($meal->food_ingredient->vitamin_b1 * $calculationQuantity);
            $yesterdaysVitaminc += ($meal->food_ingredient->vitamin_c * $calculationQuantity);
            $yesterdaysSalt += ($meal->food_ingredient->salt * $calculationQuantity);
            $yesterdaysDietaryFiber += ($meal->food_ingredient->dietary_fiber * $calculationQuantity);
            $yesterdaysCalcium += ($meal->food_ingredient->calcium * $calculationQuantity);
        }
        
        return view('meal.create', compact(
            'today',
            'yesterday',
            'todaysEnergy',
            'todaysProtein',
            'todaysFat',
            'todaysCarbon',
            'todaysVitaminb1',
            'todaysVitaminc',
            'todaysSalt',
            'todaysDietaryFiber',
            'todaysCalcium',
            'yesterdaysEnergy',
            'yesterdaysProtein',
            'yesterdaysFat',
            'yesterdaysCarbon',
            'yesterdaysVitaminb1',
            'yesterdaysVitaminc',
            'yesterdaysSalt',
            'yesterdaysDietaryFiber',
            'yesterdaysCalcium'
        ));
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

        $todaysEnergy = 0;
        $todaysProtein = 0;
        $todaysFat = 0;
        $todaysCarbon = 0;
        $todaysVitaminb1 = 0;
        $todaysVitaminc = 0;
        $todaysSalt = 0;
        $todaysDietaryFiber = 0;
        $todaysCalcium = 0;

        $today = Carbon::now()->format("Y-m-d");
        $todaysMeal = Meal::where('ate_at', "{$today}")->get();

        foreach ($todaysMeal as $meal) {
            $calculationQuantity = $meal->quantity/100;
            $todaysEnergy += ($meal->food_ingredient->energy_kcal * $calculationQuantity);
            $todaysProtein += ($meal->food_ingredient->protein * $calculationQuantity);
            $todaysFat += ($meal->food_ingredient->fat * $calculationQuantity);
            $todaysCarbon += ($meal->food_ingredient->carbon * $calculationQuantity);
            $todaysVitaminb1 += ($meal->food_ingredient->vitamin_b1 * $calculationQuantity);
            $todaysVitaminc += ($meal->food_ingredient->vitamin_c * $calculationQuantity);
            $todaysSalt += ($meal->food_ingredient->salt * $calculationQuantity);
            $todaysDietaryFiber += ($meal->food_ingredient->dietary_fiber * $calculationQuantity);
            $todaysCalcium += ($meal->food_ingredient->calcium * $calculationQuantity);
        }

        $yesterdaysEnergy = 0;
        $yesterdaysProtein = 0;
        $yesterdaysFat = 0;
        $yesterdaysCarbon = 0;
        $yesterdaysVitaminb1 = 0;
        $yesterdaysVitaminc = 0;
        $yesterdaysSalt = 0;
        $yesterdaysDietaryFiber = 0;
        $yesterdaysCalcium = 0;

        $yesterday = Carbon::now()->subDay()->format("Y-m-d");
        $yesterdaysMeal = Meal::where('ate_at', "{$yesterday}")->get();

        foreach ($yesterdaysMeal as $meal) {
            $calculationQuantity = $meal->quantity/100;
            $yesterdaysEnergy += $meal->food_ingredient->energy_kcal;
            $yesterdaysProtein += ($meal->food_ingredient->protein * $calculationQuantity);
            $yesterdaysFat += ($meal->food_ingredient->fat * $calculationQuantity);
            $yesterdaysCarbon += ($meal->food_ingredient->carbon * $calculationQuantity);
            $yesterdaysVitaminb1 += ($meal->food_ingredient->vitamin_b1 * $calculationQuantity);
            $yesterdaysVitaminc += ($meal->food_ingredient->vitamin_c * $calculationQuantity);
            $yesterdaysSalt += ($meal->food_ingredient->salt * $calculationQuantity);
            $yesterdaysDietaryFiber += ($meal->food_ingredient->dietary_fiber * $calculationQuantity);
            $yesterdaysCalcium += ($meal->food_ingredient->calcium * $calculationQuantity);
        }
        
        return view('meal.create', compact(
            'today',
            'yesterday',
            'todaysEnergy',
            'todaysProtein',
            'todaysFat',
            'todaysCarbon',
            'todaysVitaminb1',
            'todaysVitaminc',
            'todaysSalt',
            'todaysDietaryFiber',
            'todaysCalcium',
            'yesterdaysEnergy',
            'yesterdaysProtein',
            'yesterdaysFat',
            'yesterdaysCarbon',
            'yesterdaysVitaminb1',
            'yesterdaysVitaminc',
            'yesterdaysSalt',
            'yesterdaysDietaryFiber',
            'yesterdaysCalcium'
        ));
    }
}
