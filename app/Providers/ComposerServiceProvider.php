<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;
use App;

class ComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$projectRepository = App::make('App\Dave\Repositories\IProjectRepository');

		View::composer(['layouts.main', 'project.details'], function($view) use ($projectRepository)
		{
			$user = Auth::user();
			$quantity = $projectRepository->quantity();
			$markup = view('project.partials.example')->with('qualquerCoisa', 'Qualquer coisa mesmo!');
			$view->with(compact('user', 'quantity','markup'));
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
