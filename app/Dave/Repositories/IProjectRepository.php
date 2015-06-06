<?php namespace App\Dave\Repositories;

interface IProjectRepository
{
    public function projects($search);
    public function store($input);
    public function show($id);
    public function update($input, $id);
    public function destroy($id);
    public function create();
    public function usersForSelect();
}