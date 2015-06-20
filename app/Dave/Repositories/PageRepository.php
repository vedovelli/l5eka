<?php namespace App\Dave\Repositories;

use App\Dave\Models\Page as Page;

use App\Dave\Repositories\ISectionRepository as SectionRepository;

class PageRepository implements IPageRepository
{
    protected $sectionRepository;

    function __construct(SectionRepository $sectionRepository)
    {
        $this->sectionRepository = $sectionRepository;
    }

    public function pages($sectionId)
    {

    }

    public function show($id)
    {

    }

    public function store($sectionId, $input)
    {
        $page = new Page();
        $page->title = $input['title'];
        $page->content = $input['content'];

        $section = $this->sectionRepository->show($sectionId);
        $section->pages()->save($page);

        return $page->save();
    }

}