<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $Categories = Category::query()
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })
            ->paginate(12);
        return view('category.view', [
            'Categories' => $Categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index')->with('success', 'Category added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $category = Category::findOrFail($id);
    return view('category.edit', compact('category'));
}

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{

    $request->validate([
        'name' => 'required|string|max:255|unique:categories,name,'.$id
    ]);

    $category = Category::findOrFail($id);
    $category->update([
        'name' => $request->name
    ]);

    return redirect()->route('category.index')
                     ->with('success', 'Category updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
