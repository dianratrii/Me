<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
use Session;

class CategoriesController extends Controller
{
  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
  {
      $categories = Category::all();

      return view('categories/index', compact('categories'));
  }

  public function create()
  {
      return view('categories/form');
  }

  public function store(CategoryRequest $request)
  {
      $category = Category::create($request->all());

      Session::flash('success','Successfully created category data');

      return redirect()->route('categories.index');
  }

  public function edit(Request $request)
  {
      $category = Category::find($request->id);
      return view('categories/form', compact('category'));
  }

  public function update(CategoryRequest $request, Category $category)
  {
      $category->update($request->all());

      Session::flash('success','Successfully updated category data');

      return redirect()->route('categories.index');
  }

  public function delete(Request $request)
  {
      $category = Category::find($request->id);
      $category->delete();

      return redirect()->route('categories.index');
  }
}
