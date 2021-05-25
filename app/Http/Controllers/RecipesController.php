<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $recipes = $user->recipes()->orderBy('created_at', 'desc')->paginate(10);
            
            $data =[
                'user' => $user,
                'recipes' => $recipes,
                ];
        }
        return view('welcome', $data);
    }
    
    public function create()
    {
        $recipes = new Recipe;
        
        return view('recipes.create', [
            'recipe' =>$recipe,
            ]);
    }
    
    public function store(Request $request)
    {
        $request->user()->recipes()->create([
            
        $recipe->title = $request->title,
        $recipe->child_age = $request->child_age,
        $recipe->description = $request->description,
        $recipe->material = $request->material,
        $recipe->how_to_make = $request->how_to_make,
        $recipe->recipe_image = $request->recipe_image,
        $recipe->user_id = Auth::user()->id,
        ]);
        
        return back();
    }
}
