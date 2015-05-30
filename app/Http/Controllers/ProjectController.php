<?php namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest as Request;
use App\Dave\Repositories\IProjectRepository as Repository;

class ProjectController extends Controller {

    protected $repository;

    function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

	public function index()
	{
        $search = \Request::get('search');

        $projects = $this->repository->projects($search);

		return view('project.index')->with(compact('projects', 'search'));
	}

    public function store(Request $request)
    {
        $result = $this->repository->store($request->all());

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar projeto']);
        }

        return redirect()->back()->with('success', 'Projeto salva com sucesso!');
    }

    public function edit($id)
    {
        $search = \Request::get('search');

        $project = $this->repository->show($id);

        $projects = $this->repository->projects($search);

        return view('project.edit')->with(compact('project', 'projects', 'search'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->repository->update($request->all(), $id);

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar projeto']);
        }

        return redirect()->route('project.index')->with('success', 'Projeto salvo com sucesso!');
    }

    public function destroy($id)
    {
        $result = $this->repository->destroy($id);

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao remover projeto']);
        }

        return redirect()->back()->with('success', 'Projeto removido com sucesso!');
    }


}
