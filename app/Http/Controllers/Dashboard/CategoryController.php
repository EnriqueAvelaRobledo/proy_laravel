<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\PutRequest;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::paginate(3);
        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
       // dd($categories);


        echo view('dashboard.category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {


    Category::create($request->validated());
    return to_route("category.index")->with('status',"Registro creado.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('dashboard.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
          echo view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PutRequest $request, Category $category)
    {

        $category->update($request->validated());
        return to_route("category.index")->with('status',"Registro actualizado.");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //echo "destroyer";
        $category->delete();
        return to_route("category.index")->with('status',"Registro eliminado.");

    }
}
