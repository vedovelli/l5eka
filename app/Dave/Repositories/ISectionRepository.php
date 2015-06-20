<?php namespace App\Dave\Repositories;

interface ISectionRepository
{
    public function sections($projectId);
    public function show($id);
    public function store($projectId, $input);
}