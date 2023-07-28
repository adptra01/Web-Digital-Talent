<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function store(Request $request)
    {
        Tag::create($request->only('name'));

        return back()->with('success', 'Successfully added tag');
    }

    public function update($id, Request $request)
    {
        Tag::whereId($id)->update($request->only('name'));

        return back()->with('success', 'Successfully updated tag');
    }

    public function destroy($id)
    {
        Tag::whereId($id)->delete();

        return back()->with('success', 'Successfully deleted tag');

    }
}
