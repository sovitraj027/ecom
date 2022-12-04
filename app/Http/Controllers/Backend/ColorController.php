<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ColorRequest;
use App\Models\Backend\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('backend.color.index', [

            'colors' => Color::latest()->get()

        ]);
    }

    public function create()
    {
        return view('backend.color.create');
    }

    public function store(ColorRequest $request)
    {

        Color::create($request->validated());
        return redirect()->route('colors.index')->with('success', 'Color Created Successfully!');
    }

    public function edit(Color $color)
    {
        return view('backend.color.edit', compact('color'));
    }

    public function update(ColorRequest $request, Color $color)
    {
        $color->update($request->validated());

        return redirect()->route('colors.index')->with('info', 'Color Updated Successfully!');
    }

    public function destroy(Color $color)
    {
        $color->delete();

        return redirect()->route('colors.index')->with('error', 'Color Deleted Successfully!');
    }
}
