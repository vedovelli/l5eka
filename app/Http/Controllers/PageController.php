<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dave\Repositories\IPageRepository as PageRepository;

use Illuminate\Http\Request;

class PageController extends Controller {

    protected $pageRepository;

    function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function create($project_id, $section_id)
    {
        return view('pages.create')->with(compact('project_id','section_id'));
    }

    public function store($project_id, $section_id)
    {
        $result = $this->pageRepository->store($section_id, \Request::all());

        return redirect()->route('project.details', $project_id)->with('success', 'Página criada com sucesso');
    }

    public function details($id, $projectId)
    {
        $page = $this->pageRepository->show($id);

        return view('pages.details')->with(compact('page', 'projectId'));
    }



}
