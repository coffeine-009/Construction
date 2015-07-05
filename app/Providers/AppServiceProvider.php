<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);

        $this->app->bind(
            'App\Services\CategoryService',
            'App\Services\Implementation\CategoryServiceImpl'
        );

        $this->app->bind(
            'App\Services\ItemService',
            'App\Services\Implementation\ItemServiceImpl'
        );

        $this->app->bind(
            'App\Services\AttachmentService',
            'App\Services\Implementation\AttachmentServiceImpl'
        );

        $this->app->bind(
            'App\Services\AdvertisementService',
            'App\Services\Implementation\AdvertisementServiceImpl'
        );

        $this->app->bind(
            'App\Services\Implementation\UploadHandler',
            'App\Services\Implementation\UploadHandler'
        );
	}

}
