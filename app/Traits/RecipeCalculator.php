<?php

namespace App\Traits;

use App\Models\DogKillogramPercentage;
use App\Models\ObjectModel;
use App\Models\Pet;
use App\Models\Recipe;
use App\Models\Supplement;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

trait RecipeCalculator
{
    public function recipeCalc($recipeId, $dogId, $objectId = null)
    {
        $pet = Pet::where('id', $dogId)->with(['acivityPercentage', 'neuteredPercentage', 'weightPercentage'])->first();

        $recipe = Recipe::where('id', $recipeId)->with(['products.category'])->first();

        if (isset($objectId)) {
            $object = ObjectModel::with(['products'])->firstWhere('id', $objectId);
            $objectProducts = $object->products->pluck('pivot', 'id')->toArray();
        }

        $kgPercentage = DogKillogramPercentage::where('min_age', '<=', $pet->weight)->where('max_age', '>=', $pet->weight)->first();

        if (!isset($kgPercentage)) {
            $kgPercentage = DogKillogramPercentage::orderBy('max_age', 'desc')->first();
            if ($pet->weight < $kgPercentage->max_age) {
                $kgPercentage = DogKillogramPercentage::orderBy('min_age')->first();
            }
        }

        $mainRecipeWeight = $pet->weight * $kgPercentage->percentage / 100;
        $idkHowToCallThisShit = $mainRecipeWeight;
        $mainRecipeWeight = $mainRecipeWeight + ($mainRecipeWeight * $pet->acivityPercentage->percentage / 100) + ($mainRecipeWeight * $pet->neuteredPercentage->percentage / 100) + ($mainRecipeWeight * $pet->weightPercentage->percentage / 100);

        $productArr = [];
        $kcal = 0;
        $price = 0;
        $weight = 0;
        $totalPercentage = 0;
        $mainWeightWithPercentage = 0;
        if ($recipe) {
            foreach ($recipe->products as $product) {
                $productWeight = $mainRecipeWeight * $product->pivot->percentage / 100;
                $priceByWeight = $productWeight * ($objectProducts[$product->id]['sell_price'] ?? $product->sell_price);
                $kcalByWeight = (($productWeight * 1000) * $product->kcal) / 100;
                $productArr[$product->id] = [
                    'weight' => $productWeight,
                    'prefix' => $product->category->prefix,
                    'name' => $product->name,
                    'percentage' => $product->pivot->percentage,
                    'price' => $priceByWeight,
                    'kcal' => $product->kcal,
                    'kcalByWeight' => $kcalByWeight,
                ];

                $mainWeightWithPercentage += $productWeight;

                if (isset($objectId)) {
                    $productArr[$product->id]['code'] = $object->prefix . parseId($object->id) . '-' . $product->prefix;
                }
                $totalPercentage += $product->pivot->percentage;
                $kcal += $kcalByWeight;
                $price += $priceByWeight;
                $weight += $productWeight;
            }
        }

        $supplements = Supplement::all()->pluck('value', 'label')->toArray();
        $totalProductsPrice = $price;
        $price = ($price * $supplements['supplement'] / 100) + $supplements['hard_supplement'];

        return [
            'products' => $productArr ?? [],
            'price' => round($price ?? 0, 2, 2),
            'weight' => $mainWeightWithPercentage * 1000,
            'kcal' => $kcal ?? [],
            'kgPercentage' => $kgPercentage->percentage,
            'idkHowToCallThisShit' => $idkHowToCallThisShit,
            'totalPercentage' => $totalPercentage ?? 0,
            'totalProductsPrice' => $totalProductsPrice,
            'supplement' => $supplements['supplement'],
            'hard_supplement' => $supplements['hard_supplement'],
        ];
    }
}
