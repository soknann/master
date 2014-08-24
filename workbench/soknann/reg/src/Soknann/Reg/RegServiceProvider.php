<?php namespace Soknann\Reg;

use Illuminate\Support\ServiceProvider;

class RegServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('soknann/reg','soknann/reg');
        include __DIR__ . '/../../filters.php';
        include __DIR__ . '/../../routes.php';
        \Former::framework('TwitterBootstrap3');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        // Facade for Lookup
        $this->app['lookup'] = $this->app->share(
            function ($app) {
                return new Libraries\Lookup;
            }
        );

        $this->app->booting(
            function () {
                $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                $loader->alias('Lookup', 'Soknann\Reg\Facades\Lookup');
            }
        );

        // Facade for Action
        $this->app['action'] = $this->app->share(
            function ($app) {
                return new Libraries\Action;
            }
        );

        $this->app->booting(
            function () {
                $loader = \Illuminate\Foundation\AliasLoader::getInstance();
                $loader->alias('Action', 'Soknann\Reg\Facades\Action');
            }
        );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
