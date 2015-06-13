<?php namespace App\Dave\Repositories;

use \App\Project as Project;
use \App\User as User;
use \App\Section as Section;
use \App\Page as Page;

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

    public function storeSection($project_id, $input)
    {
        $section = new Section();
        $section->name = $input['name'];

        $project = $this->show($project_id);
        $project->sections()->save($section);

        return $section->save();
    }

    public function storePage($section_id, $input)
    {
        $page = new Page();
        $page->title = $input['title'];
        $page->content = $input['content'];

        $section = Section::find($section_id);
        $section->pages()->save($page);

        return $page->save();
    }

}