<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DogActivityPercentage;
use App\Models\DogKillogramPercentage;
use App\Models\DogNeuteredPercentage;
use App\Models\DogWeightLvlPercentage;
use App\Models\RecipeType;
use App\Models\RecipeTypePercentage;
use App\Models\Supplement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;

class RecipeParametersController extends Controller
{
    public function recipeParams()
    {
        $recipeParameters = RecipeType::with(['recipeParameters', 'recipeParameters.category'])->get();

        $dogKillogramPercentages = DogKillogramPercentage::all();

        $dogNeuteredPercentages = DogNeuteredPercentage::all();

        $dogActivityPercentages = DogActivityPercentage::all();

        $dogWeightLvlPercentages = DogWeightLvlPercentage::all();

        $supplements = Supplement::all()->pluck('value', 'label')->toArray();

        return view('admin.recipe.parameters', compact(
            'recipeParameters',
            'dogKillogramPercentages',
            'dogNeuteredPercentages',
            'dogActivityPercentages',
            'dogWeightLvlPercentages',
            'supplements'
        ));
    }

    public function recipeParamsEdit(Request $request)
    {
        if (isset($request->edd_weight)) {
            Cache::rememberForever('eggWeight', function () use ($request) {
                return $request->edd_weight;
            });
        }

        foreach ($request->recipeParams as $recipeTypeId => $categories) {
            foreach ($categories as $categoryId => $percentage) {
                RecipeTypePercentage::where('recipe_type_id', $recipeTypeId)
                    ->where('category_id', $categoryId)
                    ->update([
                        'percentage' => $percentage ?? 0,
                    ]);
            }
        }

        return redirect()->route('admin.recipe.parameters.view');
    }

    public function recipeParamPercentagesEdit(Request $request)
    {
        foreach ($request->dog_kg_percentage as $id => $percentage) {
            DogKillogramPercentage::where('id', $id)->update([
                'percentage' => $percentage,
                'min_age' => $request->min_age[$id],
                'max_age' => $request->max_age[$id],
            ]);
        }

        foreach ($request->dog_neutered_percentage as $id => $percentage) {
            DogNeuteredPercentage::where('id', $id)->update(['percentage' => $percentage]);
        }

        foreach ($request->dog_weight_lvl_percentage as $id => $percentage) {
            DogWeightLvlPercentage::where('id', $id)->update(['percentage' => $percentage]);
        }

        foreach ($request->dog_activity_percentage as $id => $percentage) {
            DogActivityPercentage::where('id', $id)->update(['percentage' => $percentage]);
        }

        return redirect()->route('admin.recipe.parameters.view');
    }

    public function recipeSupplementsEdit(Request $request)
    {
        Supplement::where('label', 'supplement')->update(['value' => $request->supplement]);
        Supplement::where('label', 'hard_supplement')->update(['value' => $request->hard_supplement]);

        return redirect()->route('admin.recipe.parameters.view');
    }

    public function recipeParamsByType(Request $request)
    {
        $recipeTypePercentages = RecipeTypePercentage::where('recipe_type_id', $request->recipeTypeId)->get();

        return response()->json(['success' => true, 'recipeTypePercentages' => $recipeTypePercentages]);
    }
}
