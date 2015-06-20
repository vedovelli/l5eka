<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'App\Dave\Repositories\IUserRepository',
			'App\Dave\Repositories\UserRepository'
		);

		$this->app->bind(
			'App\Dave\Repositories\IProjectRepository',
			'App\Dave\Repositories\ProjectRepository'
		);

		$this->app->bind(
			'App\Dave\Repositories\ICategoryRepository',
			'App\Dave\Repositories\CategoryRepository'
		);

		$this->app->bind(
			'App\Dave\Repositories\ISectionRepository',
			'App\Dave\Repositories\SectionRepository'
		);

		$this->app->bind(
			'App\Dave\Repositories\IPageRepository',
			'App\Dave\Repositories\PageRepository'
		);

		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
