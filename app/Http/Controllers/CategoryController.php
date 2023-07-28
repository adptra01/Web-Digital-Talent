<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        Category::create($request->only('name'));

        return back()->with('success', 'Successfully added category');
    }

    public function update($id, Request $request)
    {
        Category::whereId($id)->update($request->only('name'));

        return back()->with('success', 'Successfully updated category');
    }

    public function destroy($id)
    {
        Category::whereId($id)->delete();
        
        return back()->with('success', 'Successfully deleted category');

    }
}
