<?php namespace App\Dave\Repositories;

use App\Dave\Models\Section as Section;

use \App\Dave\Repositories\IProjectRepository as ProjectRepository;

class SectionRepository implements ISectionRepository
{

    protected $projectRepository;

    function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function sections($projectId)
    {

    }

    public function show($id)
    {
        return Section::find($id);
    }

    public function destroy($id)
    {
        $section = Section::find($id);

        return $section->delete();
    }

    public function store($projectId, $input)
    {
        $section = new Section();
        $section->name = $input['name'];

        $project = $this->projectRepository->show($projectId);
        $project->sections()->save($section);

        return $section->save();
    }

}