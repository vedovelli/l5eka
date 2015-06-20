<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller {

	protected $userRepository;

    function __construct()
    {
        $this->userRepository = \App::make('App\Dave\Repositories\IUserRepository');
    }

    public function details($id, $projectId)
    {
        $user = $this->userRepository->show($id);

        if(is_null($user))
        {
            return 'exploda!!!';
        }

        return view('users.details')->with(compact('user', 'projectId'));
    }

}
