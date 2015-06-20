<?php namespace App\Dave\Repositories;

interface IPageRepository
{
    public function pages($sectionId);
    public function show($id);
    public function store($sectionId, $input);
}