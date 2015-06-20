<?php namespace App\Dave\Repositories;

use App\Dave\Models\Project as Project;
use App\Dave\Models\User as User;
use App\Dave\Models\Section as Section;
use App\Dave\Models\Page as Page;

use App\Dave\Repositories\ICategoryRepository as CategoryRepository;

class ProjectRepository implements IProjectRepository
{
    protected $categoryRepository;

    function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function projects($search)
    {
        if(!is_null($search) && !empty($search))
        {
            $projects = Project::where('name', 'like', '%'.$search.'%')->orderBy('created_at', 'DESC')->paginate(6);
        } else {
            $projects = Project::orderBy('created_at', 'DESC')->paginate(6);
        }

        return $projects;
    }

    public function store($input)
    {
        return $this->save($input);
    }

    public function show($id)
    {
        $project = Project::with(['categories', 'members', 'owner', 'sections'])->find($id);

        return $project;
    }

    public function create()
    {

    }

    public function update($input, $id)
    {
        return $this->save($input, $id);
    }

    public function destroy($id)
    {
        $project = $this->show($id);

        $result = $project->delete();

        return $result;
    }

    public function usersForSelect()
    {
        $users = User::all();

        return $users->lists('name', 'id');
    }

    protected function save($input, $id = null)
    {
        if(is_null($id))
        {
            $project = new Project();
        } else {
            $project = $this->show($id);
        }

        /**
        * Project
        */
        $project->fill($input);

        /**
        * Dependencia 1: owner
        */
        $user = User::find($input['owner']);
        $user->project()->save($project);

        /**
        * Dependencia 2: members
        */
        $project->members()->sync($input['users']);

        /**
        * Dependencia 3: categories
        */
        $project->categories()->sync($input['categories']);

        $result = $project->save(); // id

        return ['result' => $result, 'project' => $project];
    }

}