<?php namespace App\Dave\Repositories;

use \App\Project as Project;

class ProjectRepository implements IProjectRepository
{
    public function projects($search)
    {
        if(!is_null($search) && !empty($search))
        {
            $projects = Project::where('name', 'like', '%'.$search.'%')->paginate(6);
        } else {
            $projects = Project::paginate(6);
        }

        return $projects;
    }

    public function store($input)
    {
        $project = new Project();

        $project->name = $input['name'];

        $result = $project->save();

        return $result;
    }

    public function show($id)
    {
        $project = Project::find($id);

        return $project;
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

}