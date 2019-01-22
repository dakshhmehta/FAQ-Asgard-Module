<?php

namespace Modules\Faq\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Faq\Events\Handlers\RegisterFaqSidebar;

class FaqServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterFaqSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('faq', array_dot(trans('faq::faq')));
            // append translations
        });
    }

    public function boot()
    {
        $this->publishConfig('faq', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
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

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Faq\Repositories\FaqRepository',
            function () {
                $repository = new \Modules\Faq\Repositories\Eloquent\EloquentFaqRepository(new \Modules\Faq\Entities\Faq());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Faq\Repositories\Cache\CacheFaqDecorator($repository);
            }
        );
// add bindings
    }
}
