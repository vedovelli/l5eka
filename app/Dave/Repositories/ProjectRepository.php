<?php namespace App\Dave\Repositories;

use \App\Project as Project;
use \App\User as User;

use \App\Dave\Repositories\ICategoryRepository as CategoryRepository;

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
        /**
        * Project
        */
        $project = new Project();
        $project->fill($input);
        $result = $project->save(); // id

        /**
        * Dependencia 1: owner
        */
        $user = User::find($input['owner']);
        $user->project()->save($project);

        /**
        * Dependencia 2: members
        */
        foreach ($input['users'] as $value)
        {
            $user = User::find($value);
            $project->members()->save($user);
        }

        /**
        * Dependencia 2: members
        */
        foreach ($input['categories'] as $value)
        {
            $category = $this->categoryRepository->show($value);
            $project->categories()->save($category);
        }

        return $result;
    }

    public function show($id)
    {
        $project = Project::with('members')->with('categories')->find($id);

        return $project;
    }

    public function create()
    {

    }

    public function update($input, $id)
    {
        $project = $this->show($id);

        $project->name = $input['name'];

        $result = $project->save();

        return $result;
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
        $result = array();

        foreach ($users as $key => $value) {
            $result[$value->id] = $value->name;
        }

        return $result;
    }

}