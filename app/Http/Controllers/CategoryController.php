<?php namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest as Request;
use App\Dave\Repositories\ICategoryRepository as Repository;

class CategoryController extends Controller {

    protected $repository;

    function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

	public function index()
	{
        $search = \Request::get('search');

        $categories = $this->repository->categories($search);

		return view('category.index')->with(compact('categories', 'search'));
	}

    public function store(Request $request)
    {
        $result = $this->repository->store($request->all());

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar categoria']);
        }

        return redirect()->back()->with('success', 'Categoria salva com sucesso!');
    }

    public function edit($id)
    {
        $search = \Request::get('search');

        $category = $this->repository->show($id);

        $categories = $this->repository->categories($search);

        return view('category.edit')->with(compact('category', 'categories', 'search'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar categoria']);
        }

        return redirect()->route('category.index')->with('success', 'Categoria salva com sucesso!');
    }

    public function destroy($id)
    {
        $result = $this->repository->destroy($id);

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao remover categoria']);
        }

        return redirect()->back()->with('success', 'Categoria removida com sucesso!');
    }


}
