<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('IsAdmin');
        return view('admin.category.index')
                    ->with('categories', Category::orderBy('id', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('IsAdmin');
        $category = $request->validate([
            'name' => 'required|min:4|max:255'
        ]);

        Category::create($category);
        return redirect()->back()->with('success', 'You have Successfully created category!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   Gate::authorize('IsAdmin');
        return view('admin.category.index')
                ->with('category', $category)
                ->with('categories', Category::orderBy('id', 'desc')->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Gate::authorize('IsAdmin');
        $data = $request->validate([
            'name' => 'required|min:4|max:255'
        ]);

        $curr_category = Category::findOrFail($id);
        $curr_category->update(['name' => $data['name']]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Gate::authorize('IsAdmin');
        $category->delete();
        return back()->with('success', 'You have Successfully Deleted a category!');
    }
}
