<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BreedSeeder::class,
            AllergenSeeder::class,
            RoleSeeder::class,
            RecipeTypeSeeder::class,
            DogKillogramPerentageSeeder::class,
            DogNeuteredPercentagesSeeder::class,
            DogActivityPercentagesSeeder::class,
            DogWeightLvlPercentagesSeeder::class,
            SupplementsSeeder::class,
            OrderStatusSeeder::class,
            OrderRecipeStatusSeeder::class,
            CmsContentSeeder::class,
            OrderPaymentStatusSeeder::class,
            ModulesSeeder::class,
        ]);
    }
}
