<?php

namespace Modules\Ruleable\Providers;

//use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ruleable\Events\Handlers\RegisterRuleableSidebar;

class RuleableServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterRuleableSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('rules', array_dot(trans('ruleable::rules')));
            // append translations

        });

        //$this->registerEloquentFactoriesFrom(__DIR__ . '/../Database/factories');
    }

    public function boot()
    {
        $this->publishConfig('ruleable', 'permissions');
        $this->publishConfig('ruleable', 'config');

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
            'Modules\Ruleable\Repositories\RuleRepository',
            function () {
                $repository = new \Modules\Ruleable\Repositories\Eloquent\EloquentRuleRepository(new \Modules\Ruleable\Entities\Rule());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ruleable\Repositories\Cache\CacheRuleDecorator($repository);
            }
        );
// add bindings

    }
    /**
     * Register factories.
     *
     * @param  string  $path
     * @return void
     */
    /*protected function registerEloquentFactoriesFrom($path)
    {
        $this->app->make(EloquentFactory::class)->load($path);
    }*/
}
