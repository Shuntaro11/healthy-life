<?php

use Illuminate\Database\Seeder;

class FoodIngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = new SplFileObject('database/csv/FoodIngredients.csv');
        $file->setFlags(
            \SplFileObject::READ_CSV |
            \SplFileObject::READ_AHEAD |
            \SplFileObject::SKIP_EMPTY |
            \SplFileObject::DROP_NEW_LINE
        );

        $list = [];

        $now = Carbon::now();
        
        foreach($file as $line) {
            $list[] = [
                "food_name" => $line[0],
                "energy_kcal" => $line[1],
                "protein" => $line[3],
                "fat" => $line[4],
                "carbon" => $line[5],
                "dietary_fiber" => $line[6],
                "natrium" => $line[7],
                "kalium" => $line[8],
                "calcium" => $line[9],
                "magnesium" => $line[10],
                "iron" => $line[11],
                "zinc" => $line[12],
                "vitamin_k" => $line[13],
                "vitamin_b1" => $line[14],
                "vitamin_b2" => $line[15],
                "vitamin_b6" => $line[16],
                "vitamin_b12" => $line[17],
                "folic_acid" => $line[18],
                "vitamin_c" => $line[19],
                "salt" => $line[20],
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }

        DB::table("FoodIngredients")->insert($list);
    }
}
