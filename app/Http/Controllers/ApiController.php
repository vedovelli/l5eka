<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ApiController extends Controller
{
	protected $projectRepository;

	function __construct()
	{
		$this->projectRepository = \App::make('App\Dave\Repositories\IProjectRepository');
	}

	public function projects()
	{
		$projects = $this->projectRepository->projects($search = '', $paginate = false);

		return \Response::json($projects, 200);
		// return \Response::json(['erro' => 'Nao localizado'], 502);
	}
}
