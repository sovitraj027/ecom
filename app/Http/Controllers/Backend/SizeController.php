<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SizeRequest;
use App\Models\Backend\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        return view('backend.size.index', [

            'sizes' => Size::latest()->get()

        ]);
    }

    public function create()
    {
        return view('backend.size.create');
    }

    public function store(SizeRequest $request)
    {

        Size::create($request->validated());
        return redirect()->route('sizes.index')->with('success', 'Size Created Successfully!');
    }

    public function edit(Size $size)
    {
        return view('backend.size.edit', compact('size'));
    }

    public function update(SizeRequest $request, Size $size)
    {
        $size->update($request->validated());

        return redirect()->route('sizes.index')->with('info', 'Size Updated Successfully!');
    }

    public function destroy(Size $size)
    {
        $size->delete();

        return redirect()->route('sizes.index')->with('error', 'Size Deleted Successfully!');
    }
}
