<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Meal;
use \App\FoodIngredient;
use Carbon\Carbon;
use App\Http\Controllers\NutrientController as Nutrient;

class MealController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create()
    {
        [$meals, $today, $todaysEnergy, $todaysProtein, $todaysFat, $todaysCarbon, $todaysVitaminb1,
        $todaysVitaminc, $todaysSalt, $todaysDietaryFiber, $todaysCalcium, $yesterdaysEnergy, $yesterdaysProtein,
        $yesterdaysFat, $yesterdaysCarbon, $yesterdaysVitaminb1, $yesterdaysVitaminc, $yesterdaysSalt,
        $yesterdaysDietaryFiber, $yesterdaysCalcium, $twoDaysAgoEnergy, $twoDaysAgoProtein, $twoDaysAgoFat,
        $twoDaysAgoCarbon, $twoDaysAgoVitaminb1, $twoDaysAgoVitaminc, $twoDaysAgoSalt, $twoDaysAgoDietaryFiber,
        $twoDaysAgoCalcium, $threeDaysAgoEnergy, $threeDaysAgoProtein, $threeDaysAgoFat, $threeDaysAgoCarbon,
        $threeDaysAgoVitaminb1, $threeDaysAgoVitaminc, $threeDaysAgoSalt, $threeDaysAgoDietaryFiber,
        $threeDaysAgoCalcium, $fourDaysAgoEnergy, $fourDaysAgoProtein, $fourDaysAgoFat, $fourDaysAgoCarbon,
        $fourDaysAgoVitaminb1, $fourDaysAgoVitaminc, $fourDaysAgoSalt, $fourDaysAgoDietaryFiber, $fourDaysAgoCalcium,
        $fiveDaysAgoEnergy, $fiveDaysAgoProtein, $fiveDaysAgoFat, $fiveDaysAgoCarbon, $fiveDaysAgoVitaminb1,
        $fiveDaysAgoVitaminc, $fiveDaysAgoSalt, $fiveDaysAgoDietaryFiber, $fiveDaysAgoCalcium, $sixDaysAgoEnergy,
        $sixDaysAgoProtein, $sixDaysAgoFat, $sixDaysAgoCarbon, $sixDaysAgoVitaminb1, $sixDaysAgoVitaminc,
        $sixDaysAgoSalt, $sixDaysAgoDietaryFiber, $sixDaysAgoCalcium]=Nutrient::getNutrients();

        $days=array('1/1', '1/2', '1/3', '1/4', '1/5', '1/6', '1/7', '1/1', '1/2', '1/3', '1/4', '1/5', '1/6', '1/7');
        $bmis=array(20, 21, 23, 20, 22, 21, 20, 20, 21, 23, 20, 22, 21, 20);

        return view('meal.create', compact(
            'days',
            'bmis',
            'meals',
            'today',
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
            'yesterdaysCalcium',
            'twoDaysAgoEnergy',
            'twoDaysAgoProtein',
            'twoDaysAgoFat',
            'twoDaysAgoCarbon',
            'twoDaysAgoVitaminb1',
            'twoDaysAgoVitaminc',
            'twoDaysAgoSalt',
            'twoDaysAgoDietaryFiber',
            'twoDaysAgoCalcium',
            'threeDaysAgoEnergy',
            'threeDaysAgoProtein',
            'threeDaysAgoFat',
            'threeDaysAgoCarbon',
            'threeDaysAgoVitaminb1',
            'threeDaysAgoVitaminc',
            'threeDaysAgoSalt',
            'threeDaysAgoDietaryFiber',
            'threeDaysAgoCalcium',
            'fourDaysAgoEnergy',
            'fourDaysAgoProtein',
            'fourDaysAgoFat',
            'fourDaysAgoCarbon',
            'fourDaysAgoVitaminb1',
            'fourDaysAgoVitaminc',
            'fourDaysAgoSalt',
            'fourDaysAgoDietaryFiber',
            'fourDaysAgoCalcium',
            'fiveDaysAgoEnergy',
            'fiveDaysAgoProtein',
            'fiveDaysAgoFat',
            'fiveDaysAgoCarbon',
            'fiveDaysAgoVitaminb1',
            'fiveDaysAgoVitaminc',
            'fiveDaysAgoSalt',
            'fiveDaysAgoDietaryFiber',
            'fiveDaysAgoCalcium',
            'sixDaysAgoEnergy',
            'sixDaysAgoProtein',
            'sixDaysAgoFat',
            'sixDaysAgoCarbon',
            'sixDaysAgoVitaminb1',
            'sixDaysAgoVitaminc',
            'sixDaysAgoSalt',
            'sixDaysAgoDietaryFiber',
            'sixDaysAgoCalcium'
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

        [$meals, $today, $todaysEnergy, $todaysProtein, $todaysFat, $todaysCarbon, $todaysVitaminb1,
        $todaysVitaminc, $todaysSalt, $todaysDietaryFiber, $todaysCalcium, $yesterdaysEnergy, $yesterdaysProtein,
        $yesterdaysFat, $yesterdaysCarbon, $yesterdaysVitaminb1, $yesterdaysVitaminc, $yesterdaysSalt,
        $yesterdaysDietaryFiber, $yesterdaysCalcium, $twoDaysAgoEnergy, $twoDaysAgoProtein, $twoDaysAgoFat,
        $twoDaysAgoCarbon, $twoDaysAgoVitaminb1, $twoDaysAgoVitaminc, $twoDaysAgoSalt, $twoDaysAgoDietaryFiber,
        $twoDaysAgoCalcium, $threeDaysAgoEnergy, $threeDaysAgoProtein, $threeDaysAgoFat, $threeDaysAgoCarbon,
        $threeDaysAgoVitaminb1, $threeDaysAgoVitaminc, $threeDaysAgoSalt, $threeDaysAgoDietaryFiber,
        $threeDaysAgoCalcium, $fourDaysAgoEnergy, $fourDaysAgoProtein, $fourDaysAgoFat, $fourDaysAgoCarbon,
        $fourDaysAgoVitaminb1, $fourDaysAgoVitaminc, $fourDaysAgoSalt, $fourDaysAgoDietaryFiber, $fourDaysAgoCalcium,
        $fiveDaysAgoEnergy, $fiveDaysAgoProtein, $fiveDaysAgoFat, $fiveDaysAgoCarbon, $fiveDaysAgoVitaminb1,
        $fiveDaysAgoVitaminc, $fiveDaysAgoSalt, $fiveDaysAgoDietaryFiber, $fiveDaysAgoCalcium, $sixDaysAgoEnergy,
        $sixDaysAgoProtein, $sixDaysAgoFat, $sixDaysAgoCarbon, $sixDaysAgoVitaminb1, $sixDaysAgoVitaminc,
        $sixDaysAgoSalt, $sixDaysAgoDietaryFiber, $sixDaysAgoCalcium]=Nutrient::getNutrients();

        $days=array('1/1', '1/2', '1/3', '1/4', '1/5', '1/6', '1/7', '1/1', '1/2', '1/3', '1/4', '1/5', '1/6', '1/7');
        $bmis=array(20, 21, 23, 20, 22, 21, 20, 20, 21, 23, 20, 22, 21, 20);
        
        return view('meal.create', compact(
            'days',
            'bmis',
            'meals',
            'today',
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
            'yesterdaysCalcium',
            'twoDaysAgoEnergy',
            'twoDaysAgoProtein',
            'twoDaysAgoFat',
            'twoDaysAgoCarbon',
            'twoDaysAgoVitaminb1',
            'twoDaysAgoVitaminc',
            'twoDaysAgoSalt',
            'twoDaysAgoDietaryFiber',
            'twoDaysAgoCalcium',
            'threeDaysAgoEnergy',
            'threeDaysAgoProtein',
            'threeDaysAgoFat',
            'threeDaysAgoCarbon',
            'threeDaysAgoVitaminb1',
            'threeDaysAgoVitaminc',
            'threeDaysAgoSalt',
            'threeDaysAgoDietaryFiber',
            'threeDaysAgoCalcium',
            'fourDaysAgoEnergy',
            'fourDaysAgoProtein',
            'fourDaysAgoFat',
            'fourDaysAgoCarbon',
            'fourDaysAgoVitaminb1',
            'fourDaysAgoVitaminc',
            'fourDaysAgoSalt',
            'fourDaysAgoDietaryFiber',
            'fourDaysAgoCalcium',
            'fiveDaysAgoEnergy',
            'fiveDaysAgoProtein',
            'fiveDaysAgoFat',
            'fiveDaysAgoCarbon',
            'fiveDaysAgoVitaminb1',
            'fiveDaysAgoVitaminc',
            'fiveDaysAgoSalt',
            'fiveDaysAgoDietaryFiber',
            'fiveDaysAgoCalcium',
            'sixDaysAgoEnergy',
            'sixDaysAgoProtein',
            'sixDaysAgoFat',
            'sixDaysAgoCarbon',
            'sixDaysAgoVitaminb1',
            'sixDaysAgoVitaminc',
            'sixDaysAgoSalt',
            'sixDaysAgoDietaryFiber',
            'sixDaysAgoCalcium'
        ));
    }

    public function destroy ($id)
    {
        Meal::destroy($id);

        [$meals, $today, $todaysEnergy, $todaysProtein, $todaysFat, $todaysCarbon, $todaysVitaminb1,
        $todaysVitaminc, $todaysSalt, $todaysDietaryFiber, $todaysCalcium, $yesterdaysEnergy, $yesterdaysProtein,
        $yesterdaysFat, $yesterdaysCarbon, $yesterdaysVitaminb1, $yesterdaysVitaminc, $yesterdaysSalt,
        $yesterdaysDietaryFiber, $yesterdaysCalcium, $twoDaysAgoEnergy, $twoDaysAgoProtein, $twoDaysAgoFat,
        $twoDaysAgoCarbon, $twoDaysAgoVitaminb1, $twoDaysAgoVitaminc, $twoDaysAgoSalt, $twoDaysAgoDietaryFiber,
        $twoDaysAgoCalcium, $threeDaysAgoEnergy, $threeDaysAgoProtein, $threeDaysAgoFat, $threeDaysAgoCarbon,
        $threeDaysAgoVitaminb1, $threeDaysAgoVitaminc, $threeDaysAgoSalt, $threeDaysAgoDietaryFiber,
        $threeDaysAgoCalcium, $fourDaysAgoEnergy, $fourDaysAgoProtein, $fourDaysAgoFat, $fourDaysAgoCarbon,
        $fourDaysAgoVitaminb1, $fourDaysAgoVitaminc, $fourDaysAgoSalt, $fourDaysAgoDietaryFiber, $fourDaysAgoCalcium,
        $fiveDaysAgoEnergy, $fiveDaysAgoProtein, $fiveDaysAgoFat, $fiveDaysAgoCarbon, $fiveDaysAgoVitaminb1,
        $fiveDaysAgoVitaminc, $fiveDaysAgoSalt, $fiveDaysAgoDietaryFiber, $fiveDaysAgoCalcium, $sixDaysAgoEnergy,
        $sixDaysAgoProtein, $sixDaysAgoFat, $sixDaysAgoCarbon, $sixDaysAgoVitaminb1, $sixDaysAgoVitaminc,
        $sixDaysAgoSalt, $sixDaysAgoDietaryFiber, $sixDaysAgoCalcium]=Nutrient::getNutrients();

        $days=array('1/1', '1/2', '1/3', '1/4', '1/5', '1/6', '1/7', '1/1', '1/2', '1/3', '1/4', '1/5', '1/6', '1/7');
        $bmis=array(20, 21, 23, 20, 22, 21, 20, 20, 21, 23, 20, 22, 21, 20);
        
        return view('meal.create', compact(
            'days',
            'bmis',
            'meals',
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
            'yesterdaysCalcium',
            'twoDaysAgoEnergy',
            'twoDaysAgoProtein',
            'twoDaysAgoFat',
            'twoDaysAgoCarbon',
            'twoDaysAgoVitaminb1',
            'twoDaysAgoVitaminc',
            'twoDaysAgoSalt',
            'twoDaysAgoDietaryFiber',
            'twoDaysAgoCalcium',
            'threeDaysAgoEnergy',
            'threeDaysAgoProtein',
            'threeDaysAgoFat',
            'threeDaysAgoCarbon',
            'threeDaysAgoVitaminb1',
            'threeDaysAgoVitaminc',
            'threeDaysAgoSalt',
            'threeDaysAgoDietaryFiber',
            'threeDaysAgoCalcium',
            'fourDaysAgoEnergy',
            'fourDaysAgoProtein',
            'fourDaysAgoFat',
            'fourDaysAgoCarbon',
            'fourDaysAgoVitaminb1',
            'fourDaysAgoVitaminc',
            'fourDaysAgoSalt',
            'fourDaysAgoDietaryFiber',
            'fourDaysAgoCalcium',
            'fiveDaysAgoEnergy',
            'fiveDaysAgoProtein',
            'fiveDaysAgoFat',
            'fiveDaysAgoCarbon',
            'fiveDaysAgoVitaminb1',
            'fiveDaysAgoVitaminc',
            'fiveDaysAgoSalt',
            'fiveDaysAgoDietaryFiber',
            'fiveDaysAgoCalcium',
            'sixDaysAgoEnergy',
            'sixDaysAgoProtein',
            'sixDaysAgoFat',
            'sixDaysAgoCarbon',
            'sixDaysAgoVitaminb1',
            'sixDaysAgoVitaminc',
            'sixDaysAgoSalt',
            'sixDaysAgoDietaryFiber',
            'sixDaysAgoCalcium'
        ));
    }
}
