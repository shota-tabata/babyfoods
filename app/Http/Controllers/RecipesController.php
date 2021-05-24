<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipesController extends Controller
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
    
    public function store(Request $request)
    {
        $recipe = new Recipe();
        
        $recipe->title = $request->title;
        $recipe->child_age = $request->child_age;
        $recipe->description = $request->description;
        $recipe->material = $request->material;
        $recipe->how_to_make = $request->how_to_make;
        $recipe->recipe_image = $request->recipe_image;
        $recipe->user_id = Auth::user()->id;
        $recipe->save();
        
        return back();
    }
}
