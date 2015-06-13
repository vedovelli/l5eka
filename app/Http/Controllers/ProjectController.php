<?php namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest as Request;
use App\Dave\Repositories\IProjectRepository as ProjectRepository;
use App\Dave\Repositories\ICategoryRepository as CategoryRepository;
use App\Commands\MailCommand;

class ProjectController extends Controller {

    protected $projectRepository;
    protected $categoryRepository;

    function __construct(ProjectRepository $projectRepository, CategoryRepository $categoryRepository)
    {
        $this->projectRepository = $projectRepository;
        $this->categoryRepository = $categoryRepository;
    }

	public function index()
	{
        $search = \Request::get('search');

        $projects = $this->projectRepository->projects($search);

		return view('project.index')->with(compact('projects', 'search'));
	}

    public function create()
    {
        $project = null;

        $usersForSelect = $this->projectRepository->usersForSelect();

        $categoriesForSelect = $this->categoryRepository->categoriesForSelect();

        $owner = null;

        $categories = null;

        $members = null;

        return view('projects.form')->with(compact(
            'project', 'usersForSelect', 'categoriesForSelect',
            'owner','categories','members'));
    }

    public function show($id)
    {
    }

    public function store(Request $request)
    {
        $result = $this->projectRepository->store($request->all());

        if(!$result['result'])
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar projeto']);
        }

        $this->dispatch(new MailCommand($result['project'], 'UserAddedToProject'));

        return redirect()->back()->with('success', 'Projeto salvo com sucesso!');
    }

    public function edit($id)
    {
        $project = $this->projectRepository->show($id);

        $owner = $project->user_id;

        $usersForSelect = $this->projectRepository->usersForSelect();

        $categoriesForSelect = $this->categoryRepository->categoriesForSelect();

        $categories = $project->categories->lists('id');

        $members =  $project->members->lists('id');;

        return view('projects.form')->with(compact(
            'project', 'usersForSelect', 'categoriesForSelect',
            'owner','categories','members'));
    }

    public function update(Request $request, $id)
    {
        $result = $this->projectRepository->update($request->all(), $id);

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao salvar projeto']);
        }

        return redirect()->route('project.index')->with('success', 'Projeto salvo com sucesso!');
    }

    public function destroy($id)
    {
        $result = $this->projectRepository->destroy($id);

        if(!$result)
        {
            return redirect()->back()->withInput()->withErrors(['Falha ao remover projeto']);
        }

        return redirect()->back()->with('success', 'Projeto removido com sucesso!');
    }

    public function details($id)
    {
        $project = $this->projectRepository->show($id);

        return view('project.details')->with(compact('project'));
    }

}
