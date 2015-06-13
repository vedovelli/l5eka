<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dave\Repositories\IProjectRepository as ProjectRepository;

use Illuminate\Http\Request;

class SectionController extends Controller {

    protected $projectRepository;

    function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function store($project_id)
    {
        $result = $this->projectRepository->storeSection($project_id, \Request::all());

        return redirect()->route('project.details', $project_id)->with('success', 'Seção de conteúdo criada com sucesso');
    }

}
