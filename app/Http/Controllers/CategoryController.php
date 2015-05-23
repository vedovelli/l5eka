<?php namespace App\Http\Controllers;

class CategoryController extends Controller {

	public function index()
	{
        $categories = \App\Category::paginate(6);

		return view('category.index')->with('categories', $categories);
	}
}
