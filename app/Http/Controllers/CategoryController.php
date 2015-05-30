<?php namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest as Request;

class CategoryController extends Controller {

	public function index()
	{
        $categories = \App\Category::paginate(6);

		return view('category.index')->with('categories', $categories);
	}

    public function store(Request $request)
    {
        $category = new \App\Category();

        $category->name = $request->get('name');

        $result = $category->save();

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar categoria']);
        }

        return redirect()->back()->with('success', 'Categoria salva com sucesso!');
    }

    public function edit($id)
    {
        $category = \App\Category::find($id);

        $categories = \App\Category::paginate(6);

        return view('category.edit')->with(compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $category = \App\Category::find($id);

        $category->name = $request->get('name');

        $result = $category->save();

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar categoria']);
        }

        return redirect()->route('category.index')->with('success', 'Categoria salva com sucesso!');
    }

    public function destroy($id)
    {
        $category = \App\Category::find($id);

        $result = $category->delete();

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao remover categoria']);
        }

        return redirect()->back()->with('success', 'Categoria removida com sucesso!');
    }


}
