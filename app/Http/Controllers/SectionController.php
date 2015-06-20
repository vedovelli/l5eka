<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dave\Repositories\ISectionRepository as SectionRepository;

use Illuminate\Http\Request;

class SectionController extends Controller {

    protected $sectionRepository;

    function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function store($project_id)
    {
        $result = $this->sectionRepository->store($project_id, \Request::all());

        return redirect()->route('project.details', $project_id)->with('success', 'Seção de conteúdo criada com sucesso');
    }

    public function destroy($id)
    {
        $result = $this->sectionRepository->destroy($id);

        if(!$result)
        {
            return back()->withErrors(['Erro ao remover a seção']);
        }

        return back()->with('success', 'Seção removida com sucesso');
    }

}
