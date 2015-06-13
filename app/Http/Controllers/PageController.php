<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dave\Repositories\IProjectRepository as ProjectRepository;

use Illuminate\Http\Request;

class PageController extends Controller {

    protected $projectRepository;

    function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function create($project_id, $section_id)
    {
        return view('pages.create')->with(compact('project_id','section_id'));
    }

    public function store($project_id, $section_id)
    {
        $result = $this->projectRepository->storePage($section_id, \Request::all());

        return redirect()->route('project.details', $project_id)->with('success', 'Página criada com sucesso');
    }



}
